<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\Store\PetsRepository;
class PetsController extends Controller
{
    //
    public function index()
    {
        $pets = PetsRepository::getPets();
        return view('adoption.pets', ['pets' => $pets]);
    }
}
