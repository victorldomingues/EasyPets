<?php

namespace App\Http\Controllers\Manager\Adoptions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\Adoptions\PetsRequest;
use Illuminate\Http\Request;
use App\Models\Pet;
use DateTime;
use App\Models\Petimage;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Auth;

class PetsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    private function guid(){
        if (function_exists('com_create_guid')){
            $uuid  =   com_create_guid();
            $uuid = str_replace("{","",$uuid);
            $uuid = str_replace("}","",$uuid);
            return $uuid;
        }else{
            mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"

            $uuid = chr(123)// "{"
                    .substr($charid, 0, 8).$hyphen
                    .substr($charid, 8, 4).$hyphen
                    .substr($charid,12, 4).$hyphen
                    .substr($charid,16, 4).$hyphen
                    .substr($charid,20,12)
                    .chr(125);// "}"

            $uuid = str_replace("{","",$uuid);
            $uuid = str_replace("}","",$uuid);

            return $uuid;
        }
    }

    private function saveImage($pet){
        if($pet == null) return;

        $file = Input::file('file'); 
    
        if(Input::hasFile('file')){
            $path = 'uploads'.DIRECTORY_SEPARATOR.'pets';
            $destinationPath = public_path().DIRECTORY_SEPARATOR.$path;
            $fileName = $this->guid().".".$file->getClientOriginalExtension() ;
            $finalPath = $destinationPath.DIRECTORY_SEPARATOR.$fileName;
            $file->move($destinationPath, $fileName);
            $image  = new Petimage;
            $image->originalname = $file->getClientOriginalName();
            $image->petid   = $pet->Id;
            $image->servername  = $fileName ;
            $image->extension   = $file->getClientOriginalExtension() ;
            $image->path        = $path;
            $image->status      = 1 ;
            $image->deleted     = 0 ;
            $image->created_by  = Auth::user()->id;
            $image->save();
        }
    }


    public function index()
    {
        $pets = Pet::orderBy('created_at', 'desc')->get();

        return view('manager.adoptions.pets', ['pets' => $pets]);
    }

    // public function index()
    // {
    //     $colors = Productcolor::orderBy('created_at', 'desc')->paginate(10);
    //     return view('manager.products.colors.index',['manager.products.colors' => $colors]);
    // }
  
    public function create()
    {
        return view('manager.adoptions.pets-new');
    }
  
    public function store(PetsRequest $request)
    {
        $pet = new Pet;
        $pet->name          = $request->name;
        $pet->race          = $request->race;
        $pet->type          = $request->type;
        // $pet->description   = $request->description;
        $pet->age           = $request->age;
        $pet->deleted       = 0;
        $pet->created_by    = Auth::user()->id;
        $pet->status        = $request->status;
        $pet->save();

        $this->saveImage($pet);

        return redirect()->route('manager.pets')->with('message', 'Pet cadastrado com sucesso!');
    }
  
    public function show($id)
    {
        $pet = Pet::findOrFail($id);
        return view('manager.adoptions.pets-show', compact('pet'));
    }
  
    public function edit($id)
    {
        $pet = Pet::findOrFail($id);
        return view('manager.adoptions.pets-new', compact('pet'));
    }

    public function update(PetsRequest $request, $id)
    {
        $pet = Pet::findOrFail($id);
        $pet->name          = $request->name;
        // $pet->description   = $request->description;
        $pet->type          = $request->type;
        $pet->age           = $request->age;
        $pet->deleted       = $request->deleted;
        $pet->deleted_at    = null;
        $pet->updated_by    = Auth::user()->id;
        $pet->status        = $request->status;

        $pet->save();

        $this->saveImage($pet);

        return redirect()->route('manager.pets')->with('message', 'Pet atualizado com sucesso!');
    }
  
    public function destroy($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->updated_by    = Auth::user()->id;
        $pet->deleted_by    = Auth::user()->id;
        $pet->deleted       = 1;
        $pet->deleted_at    = new DateTime();
        $pet->save();
        return redirect()->route('manager.pets')->with('alert-success', 'Pet removido com sucesso!');
    }
}
