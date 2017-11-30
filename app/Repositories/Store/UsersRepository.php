<?php

namespace App\Repositories\Store;

use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\User;
use App\Models\Manager;
use DateTime;

class UsersRepository 
{
    public static function loggedUser(){
      return DB::table('users')
        ->select( 'users.Id',
        'users.Name', 
        'users.Email', 
        'users.Type', 
        'users.Cpf')
        ->where('users.id', "=", Auth::user()->id)
        ->first();
    }

}

