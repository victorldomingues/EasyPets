<?php

namespace App\Http\Controllers\Manager\Products;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ColorsController extends Controller
{
    //
    public function index()
    {
        return view('manager.products.colors');
    }
}
