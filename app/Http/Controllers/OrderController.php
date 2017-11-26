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
class OrderController extends Controller
{
    public function finish(OrderRequest $request){
        $user  =  Auth::user();
        if($user  ==  null){
            return redirect()->back()->withErrors(['Usuário não cadastrdo']);
            // return response()->json(['Valid' => false, 'Message' => 'Usuário não autenticado']);
        }else{
          
            OrdersRepository::finishOrder($request);
          
            // return response()->json(['Valid' => true]);
            return  redirect()->route('checkout')->with('message', 'Compra finalizada escolha a forma de pagamento');
        }
    }
    public function pay(OrderRequest $request){
        $user  =  Auth::user();
        // $user = User::findOrFail(3);
        if($user  ==  null){
            return redirect()->route('order.finish')->withErrors('message', 'Usuário deve estar logado');
        }else{
            return  redirect()->route('welcome')->with('message', 'compra finalizada com sucesso');
        }
    }
}
