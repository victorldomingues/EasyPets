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
        $ids = [];
        $colors = [];
        $cats = [];

        foreach($products as $product){
            $orderProduct = Product::find($product->ProductId);
            $ids[] = $product->ProductId;
            $cats[] = $orderProduct->ProductCategoryId;
            $colors[] = $orderProduct->ProductColorId;   
        }

        $similars = Product::whereNotIn('Id',$ids)->whereIn('ProductCategoryId',$cats)->whereIn('ProductColorId',$colors)->get();
        
        return $similars;
    }
}
