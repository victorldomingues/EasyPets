<?php

namespace App\Http\Controllers\Manager\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\Products\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Productcolor;
use App\Models\Productcategory;
use App\Models\Productmodel;
use DateTime;

use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
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
        $products = Product::orderBy('created_at', 'desc')->get();

        return view('manager.products.products', ['products' => $products]);
    }
  
    public function create()
    {
        $providers  =  Provider::orderBy('Name', 'asc')->get();
        $colors  =  Productcolor::orderBy('Name', 'asc')->get();
        $categories  =  Productcategory::orderBy('Name', 'asc')->get();
        $models  =  Productmodel::orderBy('Name', 'asc')->get();
        return view('manager.products.products-new', ['providers' => $providers, 'colors' => $colors, 'categories' => $categories, 'models' => $models  ]);
    }
  
    public function store(ProductRequest $request)
    {
        $product = new Product;
        $product->name                  = $request->name;
        $product->description           = $request->description;
        $product->status                = $request->status;
        $product->productcategoryid     = $request->productcategoryid;
        $product->productmodelid        = $request->productmodelid;
        $product->productcolorid        = $request->productcolorid;
        $product->providerid            = $request->providerid;
        $product->unitprice             = $request->unitprice;

        $product->deleted               = 0;
        
        $product->created_by            = Auth::user()->id;
        
        $product->save();
        return redirect()->route('manager.products')->with('message', 'Produto cadastrada com sucesso!');
    }
  
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('manager.products.products-show', compact('product'));
    }
  
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $providers  =  Provider::orderBy('Name', 'asc')->get();
        $colors  =  Productcolor::orderBy('Name', 'asc')->get();
        $categories  =  Productcategory::orderBy('Name', 'asc')->get();
        $models  =  Productmodel::orderBy('Name', 'asc')->get();
        return view('manager.products.products-new', ['product' => $product , 'providers' => $providers, 'colors' => $colors, 'categories' => $categories, 'models' => $models  ]);
    }
  
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name                  = $request->name;
        $product->description           = $request->description;
        $product->status                = $request->status;
        $product->productcategoryid     = $request->productcategoryid;
        $product->productmodelid        = $request->productmodelid;
        $product->productcolorid        = $request->productcolorid;
        $product->providerid            = $request->providerid;
        $product->unitprice             = $request->unitprice;
        $product->updated_by            = Auth::user()->id;
        $product->save();
        return redirect()->route('manager.products')->with('message', 'Produto atualizada com sucesso!');
    }
  
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->updated_by    = Auth::user()->id;
        $product->deleted_by    = Auth::user()->id;
        $product->deleted       = 1;
        $product->deleted_at    = new DateTime();
        $product->save();
        return redirect()->route('manager.products')->with('alert-success', 'Produto removida com sucesso!');
    }
}
