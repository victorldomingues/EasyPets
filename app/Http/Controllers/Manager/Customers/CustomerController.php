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
use DB;
use App\Helpers\GuidHelper;
// Import the Postmark Client Class:
use Postmark\PostmarkClient;

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
        $customers = DB::table('customers')
        ->join('users', 'users.id', '=', 'customers.id')
        ->select('users.Id', 'users.Name' ,'customers.Birthday', 'customers.PublicPlace', 'customers.ZipCode', 'customers.Number', 'customers.Neighborhood', 'customers.City', 'customers.State', 'customers.Complement', 'customers.Lat', 'customers.Long')
        ->orderBy('users.created_at', 'desc')
        ->get();

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
        
        $user  =  self::saveUser($request, $password);

        self::saveCustomer($request, $user);

        try{

            // try code
            $client = new PostmarkClient(env("POSTMARK_API_KEY"));
            // Send an email:
            $sendResult = $client->sendEmailWithTemplate(
            "victor@atrace.com.br",
            $request->email,
            3982421,
            [
            "first_name" => $request->name,
            "email" => $request->email,
            "password" => $password,
            "host" => $request->getSchemeAndHttpHost(),
            ]);

        } 
        catch(\Exception $e){
        // catch code
        }

        return redirect()->route('manager.customers')->with('message', 'Cliente cadastrado com sucesso!');
    }
  
    public function show($id)
    {
        $customer = DB::table('customers')
        ->join('users', 'users.id', '=', 'customers.id')
        ->select('users.Id', 'users.Name' ,'users.Cpf', 'customers.Birthday', 'customers.PublicPlace', 'customers.ZipCode', 'customers.Number', 'customers.Neighborhood', 'customers.City', 'customers.State', 'customers.Complement', 'customers.Lat', 'customers.Long')
    
        ->where('users.id', '=', $id)
        ->first();

        return view('manager.customers.customers-show', ['customer' => $customer]);
    }
  
    public function edit($id)
    {
        $customer = DB::table('customers')
        ->join('users', 'users.id', '=', 'customers.id')
        ->select('users.Id', 'users.Name' , 'users.Email', 'users.Cpf', 'customers.Birthday', 'customers.PublicPlace', 'customers.ZipCode', 'customers.Number', 'customers.Neighborhood', 'customers.City', 'customers.State', 'customers.Country', 'customers.Complement', 'customers.Lat', 'customers.Long', 'customers.PaymentPreference')
        ->where('users.id', '=', $id)
        ->first();

        return view('manager.customers.customers-new', ['customer' => $customer]);
    }
  
    public function update(CustomerRequest $request, $id)
    {
        error_log('update');
        $user = User::findOrFail($id);   
        $customer = Customer::find($id);  
        if(  $customer == null || !isset($customer)){
            $customer = self::saveCustomer($request, $user);
        }       
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
        $customer->save();
        if(isset($request->backto)){
            error_log('redirect to route '.$request->backto);
            return redirect()->route(''.$request->backto.'')->with('message', 'Cliente atualizado com sucesso!');
        }
        return redirect()->route('manager.customers')->with('message', 'Cliente atualizado com sucesso!');
    }
  
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->updated_by    = Auth::user()->id;
        $customer->deleted_at    = new DateTime();
        $customer->save();
        return redirect()->route('manager.costumers')->with('alert-success', 'Cliente removidoo com sucesso!');
    }

    private static function saveUser(CustomerRequest $request, $password){
        $user = new User;
         $user->name              = $request->name;
         $user->email             = $request->email;
         $user->password          = Hash::make($password);
         $user->type              = 1;
         $user->cpf               = $request->cpf;
         $user->save();
         return $user;
    }

    private static function saveCustomer(CustomerRequest $request, $user){
        if($user == null){
            $password  =  GuidHelper::short();
            $user = self::saveUser($request, $password);
        }
        $customer = new Customer;
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
        $customer->save();
        error_log('SALVANDO CUSTOMER');
        return $customer;
    }
}
