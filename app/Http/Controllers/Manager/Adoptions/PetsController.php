<?php

namespace App\Http\Controllers\Manager\Adoptions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\Adoptions\PetsRequest;
use Illuminate\Http\Request;
use App\Models\Pet;
use DateTime;
use App\Models\Petimage;
use App\Helpers\PetsStateHelper;
use App\Repositories\Store\PetsRepository;
use  App\Helpers\GuidHelper;


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

    private function saveImage($pet){
        
        if($pet == null) return;

        $file = Input::file('file'); 
    
        if(Input::hasFile('file')){
            $path = 'uploads'.DIRECTORY_SEPARATOR.'pets';
            $destinationPath = public_path().DIRECTORY_SEPARATOR.$path;
            $fileName = GuidHelper::guid().".".$file->getClientOriginalExtension() ;
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
        $pets = PetsRepository::getPets();
        return view('manager.adoptions.pets', ['pets' => $pets]);
    }

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
        $images  =  Petimage::where("PetId", "=", $id)->get();
        return view('manager.adoptions.pets-show', ['pet' => $pet, 'images' => $images]);
    }
  
    public function edit($id)
    {
        $pet = Pet::findOrFail($id);
        $images  =  Petimage::where("PetId", "=", $id)->whereNull('deleted_at')->get();
        return view('manager.adoptions.pets-new', ['pet' => $pet, 'images' => $images]);
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

    public function removeImage($id)
    {
        $product = PetImage::findOrFail($id);
        $product->deleted       = 1;
        $product->deleted_at    = new DateTime();
        $product->save();
        return response()->json('{"isValid": true}');
    }
}
