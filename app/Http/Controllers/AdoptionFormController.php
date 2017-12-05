<?php

namespace App\Http\Controllers;
use App\Models\Pet;
use App\Models\Petimage;
use App\Models\Adoption;
use Illuminate\Http\Request;
use App\Repositories\Store\PetsRepository;
use App\Repositories\Store\CustomersRepository;
use App\Http\Requests\Manager\Adoptions\AdoptionsRequest;
use Illuminate\Support\Facades\Auth;
use Postmark\PostmarkClient;
use DateTime;
use  App\Helpers\AdoptionsStateHelper;
class AdoptionFormController extends Controller
{
    public function index($id)
    {
        $pet = Pet::findOrFail($id);
        $images  =  PetsRepository::getImages($id);
        if(isset(Auth::user()->id)){
            $customer = CustomersRepository::getById(Auth::user()->id);
        }else{
            $customer = null;
        }
      
        return view('adoption.form', ['pet' => $pet, 'images' => $images, 'customer' =>  $customer]);
    }

    public function store(AdoptionsRequest $request, $id){
        $adoption = new Adoption;  
        $adoption->status               = AdoptionsStateHelper::open;
        $adoption->deleted              = 0;
        $adoption->mainactivity         = $request->mainactivity;
        $adoption->whowillsupport       = $request->whowillsupport;
        $adoption->adultsinthehouse     = $request->adultsinthehouse;
        $adoption->allowpets            = intval($request->allowpets);
        $adoption->customerid           = Auth::user()->id;
        $adoption->petid                = $id;
        $adoption->created_by           = Auth::user()->id;
        $adoption->save();
        self::sendEmail(Pet::findOrFail($id), Auth::user());
        return redirect()->route('manager.adoptions')->with('message', 'Adoção cadastrada com sucesso!');
    }

    public static function sendEmail($pet, $user){

        
        $client = new PostmarkClient(env("POSTMARK_API_KEY"));
        
        // Send an email:
        $sendResult = $client->sendEmailWithTemplate(
          "victor@atrace.com.br",
          $user->email,
          4125041,
          [
          "pet_name" => $pet->Name,
        ]);
    }
}
