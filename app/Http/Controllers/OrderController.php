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
use App\Models\User;
use DateTime;
use App\Http\Requests\Store\Cart\CartItemRequest ;
use App\Http\Requests\Store\Cart\OrderRequest ;
use App\Repositories\Store\OrdersRepository;
use Postmark\PostmarkClient;
class OrderController extends Controller
{
    public function finish(OrderRequest $request){
        $user  =  Auth::user();
        if($user  ==  null){
            return redirect()->back()->withErrors(['Usuário não cadastrdo']);
            // return response()->json(['Valid' => false, 'Message' => 'Usuário não autenticado']);
        }else{
            // return response()->json(['Valid' => true]);
            $order = OrdersRepository::finishOrder($request);
            return  redirect()->route('checkout')->with('message', 'Compra finalizada escolha a forma de pagamento');
        }
    }
    public function pay(OrderRequest $request){
        $user  =  Auth::user();
        // $user = User::findOrFail(3);
        if($user  ==  null){
             return response()->json(['Valid' => false]);
        }else{
            $order = OrdersRepository::pay($request);
            self::sendEmail(Auth::user(), $order,  OrdersRepository::getOrderItemsByOrderId($order->Id));
             return response()->json(['Valid' => true]);
        }
    }

    private static function sendEmail($user, $order, $orderItems){
        $client = new PostmarkClient(env("POSTMARK_API_KEY"));
        $date =  new DateTime();

        $orderDetail = [];

        foreach($orderItems as  $item){
            array_push($orderDetail, [
                "quantity" => $item->Quantity,
                "name" => $item->Name,
                "id" => $item->Id,
                "subtotal" => number_format(($item->UnitPrice * $item->Quantity), 2, ',', '.')  ,
            ]);
        }
    
        // Send an email:
        $sendResult = $client->sendEmailWithTemplate(
          "victor@atrace.com.br",
          $user->email,
          4124843,
          [
          "date" =>  $date->format('d/m/Y'),
          "user_name" => $user->name,
          "order" => $order->Id,
          "order_detail" =>  $orderDetail ,
          "total" => number_format(($order->Total), 2, ',', '.'),
        ]);
    } 
}
