<?php

namespace App\Repositories\Store;

use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\User;
use App\Models\Manager;
use DateTime;

class EmployeesRepository 
{
    public static function getById($id){
        $manager =DB::table('users')
        ->leftJoin('managers', 'managers.id', '=', 'users.id')
        ->select( 'users.Id',
        'users.Name', 
        'users.Email', 
        'users.Type', 
        'users.Cpf', 
        'managers.Role')
        ->where('users.id', "=", $id)
        ->first();
        return $manager;
    }

}