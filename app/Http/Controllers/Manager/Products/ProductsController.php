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
use App\Models\Productimage;
use DateTime;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

use  App\Helpers\GuidHelper;

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
    
    private function saveImage($product){
        
        if($product == null) return;

        $file = Input::file('file'); 
    
        if(Input::hasFile('file')){
            $path = 'uploads'.DIRECTORY_SEPARATOR.'products';
            $destinationPath = public_path().DIRECTORY_SEPARATOR.$path;
            $fileName = GuidHelper::guid().".".$file->getClientOriginalExtension() ;
            $finalPath = $destinationPath.DIRECTORY_SEPARATOR.$fileName;
            $file->move($destinationPath, $fileName);
            $image  = new Productimage;
            $image->originalname = $file->getClientOriginalName();
            $image->productid   = $product->Id;
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
        // $products = DB::table('products')
        // ->leftJoin('productcategories', 'productcategories.id', '=', 'products.productcategoryid')
        // ->select('products.Id', 'products.Name', 'products.Description', 'products.Status', 'products.UnitPrice', 'productcategories.Name as CategoryName')
        // ->orderBy('products.created_at', 'desc')
        // ->get();

        $products = DB::select("
        select 
            p.Id,
            p.Name,
            p.Slug,
            p.Description,
            p.created_at,
            p.updated_at,
            p.UnitPrice,
            p.`Status`,
            p.ProductCategoryId,
            p.ProductColorId,
            p.ProductModelId,
            pm.Name as 'ModelName',
            pc.Name as 'CategoryName',
            pco.Name as 'ColorName',
            pv.Name as 'ProviderName',
            (
                SELECT pi.ServerName from productimages pi where pi.deleted_at is null and pi.`Status` = 1 and pi.ProductId = p.Id LIMIT 1
            )as 'Image'
        from 
            products p 
            left join productmodels pm on pm.id = p.ProductModelId 
            left join productcategories pc on pc.id = p.ProductCategoryId
            left join productcolors pco on pco.id = p.ProductColorId
            left join providers pv on pv.id = p.ProviderId
        where 
            p.deleted_at is null 
        order by 
            p.created_at desc 
            ");

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
        $product->slug                  = $request->slug;
        $product->description           = $request->description;
        $product->status                = $request->status;
        $product->productcategoryid     = $request->productcategoryid;
        $product->productmodelid        = $request->productmodelid;
        $product->productcolorid        = $request->productcolorid;
        $product->providerid            = $request->providerid;
        $product->unitprice             = floatval(str_replace(",",".", $request->unitprice));

        $product->deleted               = 0;

        $product->created_by            = Auth::user()->id;
        
        $product->save();

        $this->saveImage($product);

        return redirect()->route('manager.products')->with('message', 'Produto cadastrado com sucesso!');
    }
  
    public function show($id)
    {
        // $product = Product::findOrFail($id);
        $product =DB::table('products')
        ->leftJoin('productmodels', 'productmodels.id', '=', 'products.productmodelid')
        ->leftJoin('productcategories', 'productcategories.id', '=', 'products.productcategoryid')
        ->leftJoin('productcolors', 'productcolors.id', '=', 'products.productcolorid')
        ->leftJoin('providers', 'providers.id', '=', 'products.providerid')
        ->select(   'products.Id',
                    'products.Name', 
                    'products.Slug', 
                    'products.Description', 
                    'products.Status', 
                    'products.UnitPrice', 
                    'productcategories.Name as CategoryName', 
                    'productcolors.Name as ColorName',
                    'providers.Name as ProviderName',
                    'productmodels.Name as ModelName')
        ->orderBy('products.created_at', 'desc')
        ->where('products.id', "=", $id)
        ->first();
        $images  =  Productimage::where("ProductId", "=", $id)->get();
        return view('manager.products.products-show', ['product' => $product, 'images' =>  $images]);
    }
  
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $providers  =  Provider::orderBy('Name', 'asc')->get();
        $colors  =  Productcolor::orderBy('Name', 'asc')->get();
        $categories  =  Productcategory::orderBy('Name', 'asc')->get();
        $models  =  Productmodel::orderBy('Name', 'asc')->get();
        $images  =   Productimage::where("ProductId", "=", $id)->get();
        return view('manager.products.products-new', ['product' => $product , 'providers' => $providers, 'colors' => $colors, 'categories' => $categories, 'models' => $models , 'images' => $images ]);
    }
  
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name                  = $request->name;
        $product->slug                  = $request->slug;
        $product->description           = $request->description;
        $product->status                = $request->status;
        $product->productcategoryid     = $request->productcategoryid;
        $product->productmodelid        = $request->productmodelid;
        $product->productcolorid        = $request->productcolorid;
        $product->providerid            = $request->providerid;
        $product->unitprice             = floatval(str_replace(",",".", $request->unitprice));
        $product->updated_by            = Auth::user()->id;
        $product->save();
        $this->saveImage($product);
        return redirect()->route('manager.products')->with('message', 'Produto atualizado com sucesso!');
    }
  
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->updated_by    = Auth::user()->id;
        $product->deleted_by    = Auth::user()->id;
        $product->deleted       = 1;
        $product->deleted_at    = new DateTime();
        $product->save();
        return redirect()->route('manager.products')->with('alert-success', 'Produto removido com sucesso!');
    }

}
