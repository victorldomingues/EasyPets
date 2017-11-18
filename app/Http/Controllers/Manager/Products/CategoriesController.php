<?php

namespace App\Http\Controllers\Manager\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\Products\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Productcategory;

use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
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
        $categories = Productcategory::orderBy('created_at', 'desc')->get();

        return view('manager.products.category', ['categories' => $categories]);
    }

    // public function index()
    // {
    //     $categories = Productcategory::orderBy('created_at', 'desc')->paginate(10);
    //     return view('manager.products.categories.index',['manager.products.categories' => $categories]);
    // }
  
    public function create()
    {
        return view('manager.products.category-new');
    }
  
    public function store(CategoryRequest $request)
    {
        $category = new Productcategory;
        $category->name          = $request->name;
        $category->description   = $request->description;
        $category->deleted       = $request->deleted;
        $category->created_by    = Auth::user()->id;
        $category->status        = 1;
        $category->save();
        return redirect()->route('manager.categories')->with('message', 'Cor cadastrada com sucesso!');
    }
  
    public function show($id)
    {
        //
    }
  
    public function edit($id)
    {
        $category = Productcategory::findOrFail($id);
        return view('manager.products.categories.edit', compact('product'));
    }
  
    public function update(ColorRequest $request, $id)
    {
        $category = Productcategory::findOrFail($id);
        $category->name        = $request->name;
        $category->save();
        return redirect()->route('manager.products.categories')->with('message', 'Cor atualizada com sucesso!');
    }
  
    public function destroy($id)
    {
        $category = Productcategory::findOrFail($id);
        $category->delete();
        return redirect()->route('manager.categories')->with('alert-success', 'Cor removida com sucesso!');
    }
}
