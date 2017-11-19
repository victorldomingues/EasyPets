<?php

namespace App\Http\Controllers\Manager\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\Products\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Productcategory;
use DateTime;
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
        $category->created_by    = Auth::user()->id;
        $category->deleted       = 0;
        $category->status        = $request->status;
        $category->save();
        return redirect()->route('manager.categories')->with('message', 'Categoria cadastrada com sucesso!');
    }
  
    public function show($id)
    {
        $category = Productcategory::findOrFail($id);
        return view('manager.products.category-show', compact('category'));
    }
  
    public function edit($id)
    {
        $category = Productcategory::findOrFail($id);
        return view('manager.products.category-new', compact('category'));
    }
  
    public function update(CategoryRequest $request, $id)
    {
        $category = Productcategory::findOrFail($id);
        $category->name          = $request->name;
        $category->description   = $request->description;
        $category->updated_by    = Auth::user()->id;
        $category->status        = $request->status;
        $category->save();
        return redirect()->route('manager.categories')->with('message', 'Categoria atualizada com sucesso!');
    }
  
    public function destroy($id)
    {
        $category = Productcategory::findOrFail($id);
        $category->updated_by    = Auth::user()->id;
        $category->deleted_by    = Auth::user()->id;
        $category->deleted       = 1;
        $category->deleted_at    = new DateTime();
        $category->save();
        return redirect()->route('manager.categories')->with('alert-success', 'Categoria removida com sucesso!');
    }
}
