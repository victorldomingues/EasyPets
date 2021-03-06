<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ProductsController;
use App\Repositories\Store\OrdersRepository;
use App\Repositories\Store\CustomersRepository;
use Illuminate\Support\Facades\Auth;
class CheckoutController extends Controller
{
    //
    public function index()
    {
        $products  =  OrdersRepository::getOrderFinishedItems();
        $order  =  OrdersRepository::getFinishedOrder();
        if( $order == null){
            return redirect()->route('cart')->withErrors(['Não existem compra']);
        }
        $customer  =  CustomersRepository::getById(Auth::user()->id);
        return view('checkout.checkout', ['products'=> $products, 'order' => $order, 'customer' => $customer]);
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
