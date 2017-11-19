<?php

namespace App\Http\Controllers\Manager\Adoptions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\Adoptions\PetsRequest;
use Illuminate\Http\Request;
use App\Models\Pet;

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
        $pet->description   = $request->description;
        $pet->deleted       = $request->deleted;
        $pet->created_by    = Auth::user()->id;
        $pet->status        = 1;
        $pet->save();
        return redirect()->route('manager.pets')->with('message', 'Pet cadastrado com sucesso!');
    }
  
    public function show($id)
    {
        $color = Productcolor::findOrFail($id);
        return view('manager.products.colors-show', compact('color'));
    }
  
    public function edit($id)
    {
        $color = Productcolor::findOrFail($id);
        return view('manager.products.colors-new', compact('color'));
    }
  
    public function update(ColorRequest $request, $id)
    {
        $color = Productcolor::findOrFail($id);
        $color->name          = $request->name;
        $color->description   = $request->description;
        $color->deleted       = $request->deleted;
        $color->deleted_at    = null;
        $color->updated_by    = Auth::user()->id;
        $color->save();
        return redirect()->route('manager.colors')->with('message', 'Cor atualizada com sucesso!');
    }
  
    public function destroy($id)
    {
        $color = Productcolor::findOrFail($id);
        $color->delete();
        return redirect()->route('manager.colors')->with('alert-success', 'Cor removida com sucesso!');
    }
}
