<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\Productcolor;
use App\Models\Productcategory;
use App\Models\Productimage;
use App\Models\Productmodel;

class ProductsController extends Controller
{
    //
    public function index()
    {

        $products = DB::select("
        select 
            p.Id,
            p.Name,
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
            Products p 
            left join Productmodels pm on pm.id = p.ProductModelId 
            left join productcategories pc on pc.id = p.ProductCategoryId
            left join productcolors pco on pco.id = p.ProductColorId
            left join Providers pv on pv.id = p.ProviderId
        where 
            p.deleted_at is null 
        order by 
            p.created_at desc
        ");

        

        return view('products.products', ['products' => $products]);
    }

    public function detail($id)
    {
        $product = Product::find($id);
        $category = Productcategory::find($product->ProductCategoryId);
        $color = Productcolor::find($product->ProductColorId);
        $images = Productimage::where('ProductId',$id)->get();
        
        return view(
            'products.detail', 
            array(
                'product'       => $product, 
                'title'         => $product->Name,
                'description'   => $product->Description, 
                'status'        => $product->Status, 
                'price'         => $product->UnitPrice,
                'category'      => $category->Name,
                'color'         => $color->Name,
                'images'        => $images

            )
        );
    
    }
}
