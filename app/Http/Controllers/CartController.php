<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Store\OrdersRepository;
class CartController extends Controller
{
    // 
    public function index()
    {
        $products  =  OrdersRepository::getOrderItems();
        return view('checkout.cart', ['products'=> $products]);
    }
}
