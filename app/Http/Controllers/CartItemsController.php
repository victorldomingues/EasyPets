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
class CartItemsController extends Controller
{
    // //
    // public function index()
    // {
    //     return view('checkout.cart');
    // }
    
    // response JSON

    public function items(){
        $products  =  $this->getOrderItems();
        return response()->json($products);
    }
    // respose JSON
    public function storeItem(CartItemRequest $request){
        $order  =  $this->getOrder();
        $user  =  Auth::user();
        $product  = Product::findOrFail($request->productid);
        $quantity  =  ($request->quantity != null && $request->quantity > 0 ) ? $request->quantity : 1;
       $currentCartItem  = $this->getOrderItemByProductId($product->Id);
       $cartItem  =  new OrderItem;
       if($currentCartItem  !=  null){
        $cartItem  =  OrderItem::FindOrFail($currentCartItem->Id);
       }
    
        if($cartItem == null){
            $cartItem  =  new OrderItem;
            $cartItem->deleted = 0;
            $cartItem->quantity =  $quantity;
        }else{
            $cartItem->quantity =   $cartItem->Quantity + $quantity;
        }
       
        $cartItem->UnitPrice  =  $product->UnitPrice;

        $cartItem->orderid  = $order->Id;
        $cartItem->status  = 1;
        $cartItem->productid = $request->productid;
        $cartItem->Total  =  $product->UnitPrice * $cartItem->quantity;
        if($user !=  null){
            $order->created_by  = $user->Id;
        } 
        $cartItem ->save();
        return response()->json(['isValid' => 'true']);
    }

    private function getOrder(){
        $cart  = self::getCart();
        $order =  DB::table('purchaseorders')
        ->where('Cart' , '=', $cart)
        ->first();
        if($order  ==  null){
            $order  =  $this->storeOrder();
        }
        return $order;
    }

    private static function getCart(){
        return CartHelper::get();
    }

    private function getOrderItems(){
        $order = $this->getOrder();
        $products  =  DB::table("purchaseorders")
        ->join("orderitems", "orderitems.orderid" , "=", "purchaseorders.id" )
        ->join("products", "orderitems.productid" , "=", "products.id" )
        ->where('purchaseorders.id', '=', $order->Id)
        ->where('purchaseorders.state', '=', OrderStateHelper::$open)
        ->where('purchaseorders.cart', '=', CartHelper::get())
        ->select('products.Name', 'purchaseorders.id as OrderId', 'orderitems.Quantity', 'orderitems.Id')
        ->get();
        return $products;
    }

    private function storeOrder(){
        $user  =  Auth::user();
        $order  =  new PurchaseOrder;
        $order->Cart  =  self::getCart();
        $order->State  =  OrderStateHelper::$open;
        $order->Delivery  =  false;
        $order->Ip = request()->ip();
        $order->Total = 0.00;
        $order->Subtotal = 0.00;
        $order->Discount = 0.00;
        if($user !=  null){
            $order->created_by  = $user->Id;
            $order->customerId  = $user->Id;
        }
        $order->created_at = new Datetime();
        $order->created_at = new Datetime();
        $order->save();
        return $order;
    }

    private function getOrderItemByProductId ($productId){
        return   DB::table("orderitems")
        ->where('ProductId', '=', $productId)
        ->select('orderitems.*')
        ->first() ?? null;
    }
}
