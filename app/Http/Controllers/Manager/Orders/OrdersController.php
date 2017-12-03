<?php

namespace App\Http\Controllers\Manager\Orders;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Store\OrdersRepository;
use App\Repositories\Store\CustomersRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Store\Cart\OrderRequest;
use App\Models\Purchaseorder;
use DateTime;
use DB;
class OrdersController extends Controller
{
    
    public function index()
    {
        if(Auth::user()->Type == 0){
            $orders = OrdersRepository::getOrders();
        }else{
            $orders = OrdersRepository::getOrdersByUserId(Auth::user()->id);
        }

        return view('manager.orders.orders', ['orders'=> $orders]);
    }
    public function show($id){
        $order = OrdersRepository::getOrderById($id);
        $customer = CustomersRepository::getById(Auth::user()->id);
        $products =  OrdersRepository::getOrderItemsByOrderId($order->Id);
        return view('manager.orders.orders-show', ['order'=> $order, 'customer' => $customer, 'products'=> $products]);
    }

    public function edit($id){
        $order = OrdersRepository::getOrderById($id);
        $customer = CustomersRepository::getById($id);
        $products =  OrdersRepository::getProductsByOrderId($order->Id);
        return view('manager.orders.orders-manage', ['order'=> $order, 'customer' => $customer, 'products'=> $products]);
    }

    public function update(OrderRequest $request, $id){
        
    }

  
    public function destroy($id)
    {
        $order = Purchaseorder::findOrFail(intval($id))->get();
        // $order->updated_by    = Auth::user()->id;
        // $order->deleted_by    = Auth::user()->id;
        // $order->deleted       = 1;
        // $order->deleted_at    = new DateTime();
        // $order->save();
        return redirect()->route('manager.orders')->with('alert-success', 'Ordem removida com sucesso!');
    }
}
