<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        return view('checkout.checkout');
    }
    public function cart()
    {
        return view('checkout.cart');
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
