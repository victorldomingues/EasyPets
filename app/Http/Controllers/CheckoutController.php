<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ProductsController;
use App\Repositories\Store\OrdersRepository;
class CheckoutController extends Controller
{
    //
    public function index()
    {
        $products  =  OrdersRepository::getOrderItems();
        $order  =  OrdersRepository::getOrder();
        return view('checkout.checkout', ['products'=> $products, 'order' => $order]);
    }
    public function cart()
    {
        return view('checkout.cart',['products' => ProductsController::similar(false,false,false,false)]);
    }
    public function payment()
    {
        return view('checkout.payment');
    }
    public function location()
    {
        return view('checkout.location');
    }
}
