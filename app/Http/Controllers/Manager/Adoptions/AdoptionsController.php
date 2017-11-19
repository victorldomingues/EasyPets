<?php

namespace App\Http\Controllers\Manager\Adoptions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\Adoptions\AdoptionResquest;
use Illuminate\Http\Request;
use App\Models\Adoption;
use DateTime;

use Illuminate\Support\Facades\Auth;

class AdoptionsController extends Controller
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
        $adoptions = Adoption::orderBy('created_at', 'desc')->get();

        return view('manager.adoptions.adoptions', ['adoptions' => $adoptions]);
    }

    // public function index()
    // {
    //     $colors = Productcolor::orderBy('created_at', 'desc')->paginate(10);
    //     return view('manager.products.colors.index',['manager.products.colors' => $colors]);
    // }
  
    public function create()
    {
        return view('manager.adoptions.adoptions');
    }
  
    // public function store(Adoptions $request)
    // {
    //     $adoptions = new Adoption;
    //     $adoptions->name          = $request->name;
    //     $adoptions->race          = $request->race;
    //     $adoptions->type          = $request->type;
    //     // $adoptions->description   = $request->description;
    //     $adoptions->age           = $request->age;
    //     $adoptions->deleted       = $request->deleted;
    //     $adoptions->created_by    = Auth::user()->id;
    //     $adoptions->status        = $request->status;
    //     $adoptions->save();
    //     return redirect()->route('manager.adoptions')->with('message', 'Adoção cadastrada com sucesso!');
    // }
  
    public function show($id)
    {
        $adoptions = Adoption::findOrFail($id);
        return view('manager.adoptions.adoptions-show', compact('adoption'));
    }
  
    public function edit($id)
    {
        $adoption = Adoptions::findOrFail($id);
        return view('manager.adoptions.adoptions-new', compact('pet'));
    }

    public function update(PetsRequest $request, $id)
    {
        $adoption = Adoption::findOrFail($id);
        $adoption->deleted       = $request->deleted;
        $adoption->deleted_at    = null;
        $adoption->updated_by    = Auth::user()->id;
        $adoption->status        = $request->status;

        $adoption->save();
        return redirect()->route('manager.adoptions')->with('message', 'Status de adoção atualizado com sucesso!');
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
