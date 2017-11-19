<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdoptionFormController extends Controller
{
    //
    public function index()
    {
        return view('adoption.form');
    }

}
