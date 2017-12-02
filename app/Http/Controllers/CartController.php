<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Store\OrdersRepository;
use DB;
use App\Models\Product;
use App\Models\Productcolor;
use App\Models\Productcategory;
use App\Models\Productimage;
use App\Models\Productmodel;
class CartController extends Controller
{
    // 
    public function index()
    {
        $products  =  OrdersRepository::getOrderItems();
        $similarProducts = self::similarProducts($products);
        return view('checkout.cart', ['products'=> $products, 'similar' => $similarProducts]);
    }

    public function similarProducts($products)
    {
        $ids = [];
        $colors = [];
        $cats = [];
        $all = [];

        foreach($products as $product){
            $orderProduct = Product::find($product->ProductId);
            $ids[] = $product->ProductId;
            $cats[] = $orderProduct->ProductCategoryId;
            $colors[] = $orderProduct->ProductColorId;   
        }

        $similar = Product::whereNotIn('Id',$ids)->whereIn('ProductCategoryId',$cats)->whereIn('ProductColorId',$colors)->get();

        if(count($similar) > 0){
            foreach($similar as $product){

            $image = Productimage::where('ProductId',$product->ProductId)->get();

                $all[] = (object) array(
                    'Id' => $product->Productid,
                    'Name' => $product->Name,
                    'Description' => $product->Description,
                    'ColorName' => Productcolor::find($product->ProductColorId)->Name,
                    'CategoryName' => Productcategory::find($product->ProductCategoryId)->Name,
                    'UnitPrice' => $product->UnitPrice,
                    'Image' => Productimage::where('ProductId',$product->Id)->get()[0]->ServerName
                );
            }

        }
        
        return $all;
    }
}
