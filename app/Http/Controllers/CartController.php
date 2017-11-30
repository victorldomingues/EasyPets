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
        return view('checkout.cart', ['products'=> $products, 'similars' => $similarProducts]);
    }

    public function similarProducts($products)
    {
        $similarProducts = [];
        $orderProduct = [];
        $color = [];
        $cat = [];

        foreach($products as $product){
            $orderProduct = Product::find($product->ProductId);
            $cat[] = $orderProduct->ProductCategoryId;
            $color[] = $orderProduct->ProductColorId;   
        }

        $similars = Product::whereIn('ProductCategoryId',$cat)->whereIn('ProductColorId',$color)->get();
        
        return $similars;
    }
}
