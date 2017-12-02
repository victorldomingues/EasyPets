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
class PetsRepository 
{
    const petsQuery  =  "
    select  
          pets.Id
        , pets.Name
        , pets.Race
        , pets.Type
        , pets.created_by
        , pets.created_at
        , pets.Age
        , pets.updated_by
        , pets.updated_at
        , pets.deleted_by
        , pets.deleted_at
        , pets.Status
        , pets.Deleted
        , (select petimages.ServerName from petimages  where petimages.deleted_at is null and petimages.PetId = pets.Id order by 1 desc LIMIT 1) as Image
    FROM 
        pets
    WHERE
        pets.deleted_at is null

    ";

    public static function getPets(){
        return DB::select(self::petsQuery. "
            ORDER BY Id DESC
        ");
    }

    public static function getStorePets(){
        return DB::select(self::petsQuery. "
            AND pets.State == ".PetsStateHelper::availableforadoption."
            ORDER BY Id DESC
        ");
    }

    public static function getImages($petId){
        return Petimage::where("PetId", "=", $petId)->whereNull('deleted_at')->get();
    }
}
