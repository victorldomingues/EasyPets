<?php

namespace App\Http\Controllers\Manager\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\Products\ColorRequest;
use Illuminate\Http\Request;
use App\Models\Productcolor;

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
        $colors = Productcolor::ordphpBy('created_at', 'desc')->get();

        return view('manager.products.colors', ['colors' => $colors]);
    }

    // public function index()
    // {
    //     $colors = Productcolor::orderBy('created_at', 'desc')->paginate(10);
    //     return view('manager.products.colors.index',['manager.products.colors' => $colors]);
    // }
  
    public function create()
    {
        return view('manager.products.colors-new');
    }
  
    public function store(ColorRequest $request)
    {
        $color = new Productcolor;
        $color->name          = $request->name;
        $color->description   = $request->description;
        $color->deleted       = $request->deleted;
        $color->created_by    = Auth::user()->id;
        $color->status        = 1;
        $color->save();
        return redirect()->route('manager.colors')->with('message', 'Cor cadastrada com sucesso!');
    }
  
    public function show($id)
    {
        //
    }
  
    public function edit($id)
    {
        $color = Productcolor::findOrFail($id);
        return view('manager.products.colors.edit', compact('product'));
    }
  
    public function update(ColorRequest $request, $id)
    {
        $color = Productcolor::findOrFail($id);
        $color->name        = $request->name;
        $color->save();
        return redirect()->route('manager.products.colors')->with('message', 'Cor atualizada com sucesso!');
    }
  
    public function destroy($id)
    {
        $color = Productcolor::findOrFail($id);
        $color->delete();
        return redirect()->route('manager.colors')->with('alert-success', 'Cor removida com sucesso!');
    }
}
