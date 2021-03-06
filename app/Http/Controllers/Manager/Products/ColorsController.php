<?php

namespace App\Http\Controllers\Manager\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\Products\ColorRequest;
use Illuminate\Http\Request;
use App\Models\Productcolor;
use DateTime;

use Illuminate\Support\Facades\Auth;

class ColorsController extends Controller
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
        $colors = Productcolor::orderBy('created_at', 'desc')->get();

        return view('manager.products.colors', ['colors' => $colors]);
    }
  
    public function create()
    {
        return view('manager.products.colors-new');
    }
  
    public function store(ColorRequest $request)
    {
        $color = new Productcolor;
        $color->name          = $request->name;
        $color->description   = $request->description;
        $color->deleted       = 0;
        $color->created_by    = Auth::user()->id;
        $color->status        = $request->status;
        $color->save();
        return redirect()->route('manager.colors')->with('message', 'Cor cadastrada com sucesso!');
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
        $color->updated_by    = Auth::user()->id;
        $color->status        = $request->status;
        $color->save();
        return redirect()->route('manager.colors')->with('message', 'Cor atualizada com sucesso!');
    }
  
    public function destroy($id)
    {
        $color = Productcolor::findOrFail($id);
        $color->updated_by    = Auth::user()->id;
        $color->deleted_by    = Auth::user()->id;
        $color->deleted       = 1;
        $color->deleted_at    = new DateTime();
        $color->save();
        return redirect()->route('manager.colors')->with('alert-success', 'Cor removida com sucesso!');
    }
}
