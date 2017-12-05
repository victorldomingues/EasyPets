<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Repositories\Store\DashboardRepository;
class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user  =  Auth::user();
        if($user->Type == 0){
            return view('home', ['dashboard' => DashboardRepository::getEmployee()[0]]);
        }else{
            return view('manager.dashboard.customer-dashboard', ['dashboard' => DashboardRepository::getCustomer()[0]]);
        }
    }
}
