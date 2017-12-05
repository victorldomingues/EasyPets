<?php

namespace App\Http\Controllers\Manager\Adoptions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\Adoptions\AdoptionsRequest;
use Illuminate\Http\Request;
use App\Models\Adoption;
use App\Models\Pet;
use DateTime;
use App\Repositories\Store\CustomersRepository;
use App\Repositories\Store\AdoptionsRepository;
use App\Helpers\AdoptionsStateHelper;
use App\Helpers\PetsStateHelper;
use Postmark\PostmarkClient;

use Illuminate\Support\Facades\Auth;

class AdoptionsController extends Controller
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
        $user  =  Auth::user();
        if($user->Type == 0){
            $adoptions = AdoptionsRepository::getForEmployees();
        }else{
            $adoptions = AdoptionsRepository::getForCustomers();
        }
        return view('manager.adoptions.adoptions', ['adoptions' => $adoptions]);
    }  

    public function create()
    {
        return view('manager.adoptions.adoptions-new');
    }
  
    public function store(AdoptionRequest $request)
    {
        $adoption = new Adoption;
        $customer = new Customer;
        $pet = new Pet;
        $customer->id                   = $request->id;
        $customer->save();
        $pet->id                        = $request->id;
        $pet->save();        
        $adoption->status               = $request->status;
        $adoption->deleted              = 0;
        $adoption->mainactivity         = $request->mainactivity;
        $adoption->whowillsupport       = $request->whowillsupport;
        $adoption->adultsinthehouse     = $request->adultsinthehouse;
        $adoption->allowpets            = $request->allowpets;
        $adoption->save();
        
        return redirect()->route('manager.adoptions')->with('message', 'Adoção cadastrada com sucesso!');
    }
  
    public function show($id)
    {
        $adoption = AdoptionsRepository::getById($id);
        return view('manager.adoptions.adoptions-show', ['adoption' => $adoption]);
    }
  
    public function edit($id)
    {
        $adoption = AdoptionsRepository::getById($id);
        $customer = CustomersRepository::getById($adoption->CustomerId);
        return view('manager.adoptions.adoptions-new',['adoption' => $adoption,'customer' => $customer]);
    }
  
    public function update(AdoptionsRequest $request, $id)
    {
        $adoption = Adoption::findOrFail($id);
        $pet = Pet::findOrFail($adoption->PetId);
        $customer = CustomersRepository::getById($adoption->CustomerId);
        if(intval($request->status) == AdoptionsStateHelper::adopted){

            $pet->status = PetsStateHelper::adopted;
            $pet->save();
            self::sendEmail($customer, $pet);
        }else if(intval($request->status) == AdoptionsStateHelper::canceled){
            self::sendEmail2($customer, $pet);
        }   
        $adoption->status = intval($request->status);
        $adoption->save();
        
        return redirect()->route('manager.adoptions')->with('message', 'Adoção atualizada  com sucesso!');
    }
  
    public function destroy($id)
    {
        $provider = Adoption::findOrFail($id);
        $provider->updated_by    = Auth::user()->id;
        $provider->deleted_by    = Auth::user()->id;
        $provider->deleted       = 1;
        $provider->deleted_at    = new DateTime();
        $provider->save();
        return redirect()->route('manager.adoptions')->with('alert-success', 'Adoção removida com sucesso!');
    }

    private static function sendEmail($user, $pet){
 
        
        $client = new PostmarkClient(env("POSTMARK_API_KEY"));
        
        // Send an email:
        $sendResult = $client->sendEmailWithTemplate(
          "victor@atrace.com.br",
          $user->Email,
          4125081,
          [
          "pet_name" => $pet->Name,
        ]);
    }

    private static function sendEmail2($user, $pet){
        $client = new PostmarkClient(env("POSTMARK_API_KEY"));
        // Send an email:
        $sendResult = $client->sendEmailWithTemplate(
            "victor@atrace.com.br",
            $user->Email,
        4127261,
        [
            "pet_name" => $pet->Name,
        ]);
    }
}
