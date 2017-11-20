<?php

namespace App\Http\Controllers\Manager\Customers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\Customers\CustomerRequest;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use DateTime;

use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }




    public function index()
    {
        $customers = Customer::All();

        return view('manager.customers.customers', ['customers' => $customers]);
    }

    // public function index()
    // {
    //     $customers = Productcolor::orderBy('created_at', 'desc')->paginate(10);
    //     return view('manager.products.colors.index',['manager.products.colors' => $customers]);
    // }
  
    public function create()
    {
        return view('manager.customers.customers-new');
    }
  
    public function store(CustomerRequest $request)
    {
        $user = new User;
        $customer = new Customer;
        $user->name              = $request->name;
        $user->email             = $request->email;
        $user->password          = "aaa";
        $user->type              = 1;
        $user->cpf               = $request->cpf;
        $user->save();
        $customer->id                = $user->id;
        $customer->birthday          = $request->birthday;
        $customer->publicplace       = $request->publicplace;
        $customer->zipcode           = $request->zipcode;
        $customer->number            = $request->number;
        $customer->neighborhood      = $request->neighborhood;
        $customer->city              = $request->city;
        $customer->state             = $request->state;
        $customer->country           = $request->country;
        $customer->complement        = $request->complement;
        $customer->lat               = $request->lat;
        $customer->long              = $request->long;
        $customer->paymentpreference = $request->paymentpreference;
        $customer->save();
        return redirect()->route('manager.customers')->with('message', 'Cliente cadastrado com sucesso!');
    }
  
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('manager.customers.customers-show', compact('customers'));
    }
  
    public function edit($id)
    {
        $customer = Productcolor::findOrFail($id);
        return view('manager.customers.customers-new', compact('customers'));
    }
  
    public function update(CustomerRequest $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $user = User::findOrFail($id);
        $user->name              = $request->name;
        $user->save();
        $customer->birthday          = $request->birthday;
        $customer->publicplace       = $request->publicplace;
        $customer->zipcode           = $request->zipcode;
        $customer->number            = $request->number;
        $customer->neighborhood      = $request->neighborhood;
        $customer->city              = $request->city;
        $customer->state             = $request->state;
        $customer->country           = $request->country;
        $customer->complement        = $request->complement;
        $customer->lat               = $request->lat;
        $customer->long              = $request->long;
        $customer->paymentpreference = $request->paymentpreference;
        $customer->updated_by        = Auth::user()->id;
        $customer->save();
        return redirect()->route('manager.costumer')->with('message', 'Cliente atualizado com sucesso!');
    }
  
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->updated_by    = Auth::user()->id;
        $customer->deleted_at    = new DateTime();
        $customer->save();
        return redirect()->route('manager.costumer')->with('alert-success', 'Cliente removidoo com sucesso!');
    }
}
