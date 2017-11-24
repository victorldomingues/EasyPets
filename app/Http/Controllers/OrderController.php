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
        // $user  =  Auth::user();
        $user = User::findOrFail(3);
        if($user  ==  null){
            return response()->json(['Valid' => false, 'Message' => 'Usuário não autenticado']);
        }else{
            OrdersRepository::finishOrder($request);
            return response()->json(['Valid' => true]);
        }
    }
}
