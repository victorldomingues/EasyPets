<?php

namespace App\Http\Controllers;
use App\Models\Pet;
use App\Models\PetImage;
use Illuminate\Http\Request;
use App\Repositories\Store\PetsRepository;
use App\Repositories\Store\CustomersRepository;

use Illuminate\Support\Facades\Auth;
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
}
