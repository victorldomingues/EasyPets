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
            $order->created_by  =$user->id;
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

    public static function getFinishedOrder(){
        $user  =  Auth::user();
        $order =  DB::table('purchaseorders')
        ->whereIn('State' , [OrderStateHelper::$finished])
        ->where('purchaseorders.customerId', '=', $user->id)
        ->orderBy('purchaseorders.created_at', 'desc')
        ->first() ?? null;
        if($order ==  null) return null;
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
            'orderitems.UnitPrice',
            'products.Id as ProductId'
            )
        ->get();

        return $products;
    }

    public static function getOrderFinishedItems(){
        $order = self::getFinishedOrder();
        if( $order  == null) return null;
        $products  =  DB::table("purchaseorders")
        ->join("orderitems", "orderitems.orderid" , "=", "purchaseorders.id" )
        ->join("products", "orderitems.productid" , "=", "products.id" )
        ->where('purchaseorders.id', '=', $order->Id)
        ->whereIn('purchaseorders.state', [OrderStateHelper::$finished])
        ->select(
            'products.Name', 
            'purchaseorders.id as OrderId', 
            'orderitems.Quantity', 
            'orderitems.Id',
            'orderitems.Total',
            'orderitems.UnitPrice',
            'products.Id as ProductId'
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
            $order->created_by  = $user->id;
            $order->customerId  = $user->id;
        }
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
        $user  =  Auth::user();
        $order  =  self::getOrder();
        if(isset($user->id) && isset($order->Id)){
            $orderItems  =  self::getOrderItems();
            $subtotal =  self::getTotal($orderItems);
            $order->CustomerId  = $user->id;
            $order->State =  OrderStateHelper::$finished;
            $order->ClosedDate = new DateTime();
            $order->Discount = isset($request->discount) ? $request->discount : 0;
            $order->Total =  $subtotal - (isset( $order->Discount) ? ( ( $subtotal * $order->Discount) / 100)  : 0 ) ;
            $order->Subtotal = $subtotal;
            $order->save();
            CartHelper::destory();
        }
        return $order ;
    }

    public static function pay(OrderRequest $request){
        $user  =  Auth::user();
        $order  =  self::getFinishedOrder();
        if(isset($user->id) && isset($order->Id)){
            $orderItems  =  self::getOrderFinishedItems();
            $subtotal =  self::getTotal($orderItems);
            $order->State =  OrderStateHelper::$processingPayment;
            $order->Discount = isset($request->discount) ? $request->discount : 0;
            $order->Total =  $subtotal - (isset( $order->Discount) ? ( ( $subtotal * $order->Discount) / 100)  : 0 ) ;
            $order->Subtotal = $subtotal;
            $order->save();
        }
        return $order;
    }

    private static function getTotal($items){
        $sum  = 0;
        
        if(isset($items)){
        
            foreach($items as $item){
                if(isset($item->UnitPrice) && isset($item->Quantity)){
                    $sum += $item->UnitPrice * $item->Quantity;
                }
            }
        }
        return $sum;
    }

    public static function getOrdersByUserId($id){
        if($id == null){
            $id  =  Auth::user()->id;
        }
        return DB::table('purchaseorders')
        ->where('purchaseorders.customerid', '=', $id)
        ->whereNotIn('purchaseorders.state', [OrderStateHelper::$shopping, OrderStateHelper::$open])
        ->select('purchaseorders.Id',
        DB::raw("DATE_FORMAT(purchaseorders.ClosedDate, '%Y-%m-%d') as ClosedDate"),
        DB::raw("DATE_FORMAT(purchaseorders.ClosedDate, '%d/%m/%Y') as ClosedDateFormated"),
        'purchaseorders.Total'
        )
        ->get();

    }
 public static function getOrders(){
        return DB::table('purchaseorders')
        ->whereNotIn('purchaseorders.state', [OrderStateHelper::$shopping, OrderStateHelper::$open])
        ->select('purchaseorders.Id',
        DB::raw("DATE_FORMAT(purchaseorders.ClosedDate, '%Y-%m-%d') as ClosedDate"),
        DB::raw("DATE_FORMAT(purchaseorders.ClosedDate, '%d/%m/%Y') as ClosedDateFormated"),
        'purchaseorders.Total'
        )
        ->get();
        
    }
    public static function getOrderById($id){
        $user  =  Auth::user();
        return DB::table('purchaseorders')
        ->where('purchaseorders.customerid', '=', $user->id)
        ->where('purchaseorders.id', '=', $id)
        ->first();
    }

    public static function getOrderItemsByOrderId($id){
        $products  =  DB::table("purchaseorders")
        ->join("orderitems", "orderitems.orderid" , "=", "purchaseorders.id" )
        ->join("products", "orderitems.productid" , "=", "products.id" )
        ->where('purchaseorders.id', '=', $id)
        ->whereNull('purchaseorders.deleted_at')
        ->select(
            'products.Name', 
            'purchaseorders.id as OrderId', 
            'orderitems.Quantity', 
            'orderitems.Id',
            'orderitems.Total',
            'orderitems.UnitPrice',
            'products.Id as ProductId'
            )
        ->get();

        return $products;
    }


}
