<?php

namespace App\Http\Controllers\Manager\Costumer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\Adoptions\PetsRequest;
use Illuminate\Http\Request;
use App\Models\Pet;
use DateTime;

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
        $pet->deleted       = $request->deleted;
        $pet->created_by    = Auth::user()->id;
        $pet->status        = $request->status;
        $pet->save();
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
