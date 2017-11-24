<?php

namespace App\Repositories\Store;

use Illuminate\Support\Facades\Auth;
use App\Helpers\CartHelper;
use App\Helpers\OrderStateHelper;
use DB;
use App\Models\PurchaseOrder;
use App\Models\OrderItem;
use App\Models\Product;
use App\User;
use DateTime;
use App\Http\Requests\Store\Cart\CartItemRequest ;
use App\Http\Requests\Store\Cart\OrderRequest;

class OrdersRepository 
{

    public static function storeItem(CartItemRequest $request){
        $order  =  self::getOrder();

        if($order->state != OrderStateHelper::$shopping){
            $order->state = OrderStateHelper::$shopping;
            $order->save();
        }
        $user  =  Auth::user();
        $product  = Product::findOrFail($request->productid);
        $quantity  =  ($request->quantity != null && $request->quantity > 0 ) ? $request->quantity : 1;
       $currentCartItem  = self::getOrderItemByProductId($product->Id, $order->Id);
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
        return  $cartItem;
    }

    public static function getOrder(){
        $cart  = self::getCart();
        $order =  DB::table('purchaseorders')
        ->where('Cart' , '=', $cart)
        ->whereIn('State' , [OrderStateHelper::$shopping, OrderStateHelper::$open])
        ->first();
        if($order  ==  null){
            $order  =  self::storeOrder();
        }
        $order  = PurchaseOrder::findOrFail($order->Id);
        return $order;
    }

    public static function getCart(){
        return CartHelper::get();
    }

    public static function getOrderItems(){
        $order = self::getOrder();
        $products  =  DB::table("purchaseorders")
        ->join("orderitems", "orderitems.orderid" , "=", "purchaseorders.id" )
        ->join("products", "orderitems.productid" , "=", "products.id" )
        ->where('purchaseorders.id', '=', $order->Id)
        ->whereIn('purchaseorders.state', [OrderStateHelper::$shopping])
        ->where('purchaseorders.cart', '=', CartHelper::get())
        ->select(
            'products.Name', 
            'purchaseorders.id as OrderId', 
            'orderitems.Quantity', 
            'orderitems.Id',
            'orderitems.Total',
            'orderitems.UnitPrice'
            )
        ->get();

        return $products;
    }

    public static function storeOrder(){
        $user  =  Auth::user();
        $order  =  new PurchaseOrder;
        $order->Cart  =  self::getCart();
        $order->State  =  OrderStateHelper::$open;
        $order->Delivery  =  false;
        $order->Ip = request()->ip();

        $order->Total =  0.00 ;
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

    public static function getOrderItemByProductId ($productId, $orderId){
        return   DB::table("orderitems")
        ->where('ProductId', '=', $productId)
        ->where('OrderId', '=', $orderId)
        ->select('orderitems.*')
        ->first() ?? null;
    }

    public static function finishOrder(OrderRequest $request){
        // $user  =  Auth::user();
        $user = User::findOrFail(3);
        $order  =  self::getOrder();
        if(isset($user->Id) && isset($order->Id)){
            $subtotal =  self::getTotal($orderItems);
            $orderItems  =  self::getOrderItems();
            error_log('USER ID '.  $user->Id);
            $order->CustomerId  =  $user->Id;
            $order->State = OrderStateHelper::$finished;
            $order->ClosedDate = new DateTime();
            $order->Discount = isset($request->discount) ? $request->discount : 0;
            $order->Total =  $subtotal - (isset( $order->Discount) ? ( ( $subtotal * $order->Discount) / 100)  : 0 ) ;
            $order->Subtotal = $subtotal;
            $order->save();
        }
    }

    private static function getTotal($items){
        $sum  = 0;
        
        if(isset($items)){
        
            foreach($items as $item){
                error_log('GET TOTAL ' . $item->Total);
                if(isset($item->UnitPrice) && isset($item->Quantity)){
                    $sum += $item->UnitPrice * $item->Quantity;
                }
            }
        }
        return $sum;
    }
}