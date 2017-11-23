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
class OrderController extends Controller
{
    public function store(){
        $user  =  Auth::user();
        if($user  ==  null){
            return response()->json(['Valid' => false, 'Message' => 'Usuário não autenticado']);
        }else{
            $order  =  $this->getOrder();
            $orderItems  =  $this->getOrderItems();
            $order->Status = OrderStateHelper::$finished;
            $order->save();
            return response()->json(['Valid' => true, 'Message' => 'Usuário não autenticado']);
        }
    }

    private function getOrder(){
        $cart  = self::getCart();
        $order =  DB::table('purchaseorders')
        ->where('Cart' , '=', $cart)
        ->first();
        if($order  ==  null){
            $order  =  $this->storeOrder();
        }
        $order  = PurchaseOrder::findOrFail($order->Id);
        return $order;
    }
}
