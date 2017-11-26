<?php

namespace App\Repositories\Store;

use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\User;
use App\Models\Customer;
use DateTime;

class CustomersRepository 
{
    public static function getById($id){
        $customer =DB::table('users')
        ->leftJoin('customers', 'customers.id', '=', 'users.id')
        ->select(   'users.Id',
                    'users.Name', 
                    'users.Email', 
                    'users.Type', 
                    'users.Cpf', 
                    'customers.Birthday',
                    'customers.PublicPlace', 
                    'customers.ZipCode', 
                    'customers.Number', 
                    'customers.Neighborhood', 
                    'customers.City', 
                    'customers.State', 
                    'customers.Country', 
                    'customers.Complement', 
                    'customers.PaymentPreference')
        ->where('users.id', "=", $id)
        ->first();
        return $customer;
    }

}
