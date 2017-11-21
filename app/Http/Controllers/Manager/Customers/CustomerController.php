<?php

namespace App\Http\Controllers\Manager\Customers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\Customers\CustomerRequest;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use DateTime;
use Mail;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Db;
use App\Helpers\GuidHelper;

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
        $password  =  GuidHelper::short();

        $user = new User;
        $customer = new Customer;
        $user->name              = $request->name;
        $user->email             = $request->email;
        $user->password          = Hash::make($password);
        $user->type              = 1;
        $user->cpf               = $request->cpf;
        $user->save();
        $customer->id                = $user->Id;
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

        $data = array(
            'name'=>$request->name, 
            'email'=>$request->email, 
            'password'=>$password,
            'host'=>  $request->getSchemeAndHttpHost()
        );
        
        Mail::send('emails.share',  $data, function (Message $message) use($data){
            $message
                ->subject('Bem vindo ao EasyPets')
                ->to('victor@atrace.com.br', 'EasyPets')
                ->from( $data['email'], $data['name'])
                ->embedData([
                    'personalizations' => [[
                        'substitutions' => [
                            '<%first_name%>' =>  $data['name'],
                            '<%email%>' =>  $data['email'],
                            '<%password%>' =>  $data['password'],
                            '<%host%>' => $data['host']
                        ]
                    ]
                    ],
                    'template_id' => 'f702e656-3030-4ed5-a3a2-aae253bac2cc'
                ], 'sendgrid/x-smtpapi');
        });



        return redirect()->route('manager.customers')->with('message', 'Cliente cadastrado com sucesso!');
    }
  
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('manager.customers.customers-show', compact('customers'));
    }
  
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
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
