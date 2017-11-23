<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Auth;
use App\Helpers\CartHelper;
use App\Helpers\OrderStateHelper;
use DB;
use App\Models\PurchaseOrder;
use App\Models\OrderItem;
use App\Models\Product;
use DateTime;
use App\Http\Requests\Store\Cart\CartItemRequest ;
use App\Repositories\Store\OrdersRepository;
class CartItemsController extends Controller
{
    // //
    // public function index()
    // {
    //     return view('checkout.cart');
    // }
    
    // response JSON

    public function items(){
        return response()->json(OrdersRepository::getOrderItems());
    }
    // respose JSON
    public function storeItem(CartItemRequest $request){
        OrdersRepository::storeItem($request);
        return response()->json(['Valid' => true]);
    }
}
