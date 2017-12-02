<?php

namespace App\Repositories\Store;

use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Adoption;
use App\Models\PetImage;
use App\Models\Pet;
use App\User;
use DateTime;
use App\Helpers\PetsStateHelper;
class AdoptionsRepository 
{
    const adoptionsQuery  =  "
    select
        adoptions.Id
        , adoptions.CustomerId
        , adoptions.PetId
        , adoptions.Status
        , adoptions.MainActivity
        , adoptions.WhoWillSupport
        , adoptions.AdultsInTheHouse
        , adoptions.AllowPets
        , users.name as CustomerName
        , users.email as CustomerEmail
        , pets.Name as PetName
        , pets.type as PetType
        , pets.race as PetRace
        , (select petimages.ServerName from petimages  where petimages.deleted_at is null and petimages.PetId = pets.Id order by 1 desc LIMIT 1) as PetImage
    
    FROM
        adoptions 
        inner join users on users.Id  =  adoptions.CustomerId
        inner join pets on pets.Id = adoptions.PetId
    WHERE	
        adoptions.deleted_at is null

    ";

    public static function getForEmployees(){
        return DB::select(self::adoptionsQuery. "
            ORDER BY adoptions.Id DESC
        ");
    }

    public static function getForCustomers(){
        return DB::select(self::adoptionsQuery. "
            AND adoptions.CustomerId  = ".Auth::user()->id."
            ORDER BY adoptions.Id DESC
        ");
    }

    public static function getById($id){
        return DB::select(self::adoptionsQuery. "
            AND  adoptions.Id  = ".$id."
            ORDER BY Id DESC
            LIMIT 1
        ");
    }
}
