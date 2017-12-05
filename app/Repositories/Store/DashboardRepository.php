<?php

namespace App\Repositories\Store;

use Illuminate\Support\Facades\Auth;
use DB;
use App\User;
use DateTime;
class DashboardRepository 
{
    const query  =  "
        select 
            (
                select COUNT(*) from  purchaseorders where purchaseorders.deleted_at is null and  purchaseorders.State in (3,4,5,6) and purchaseorders.CustomerId is not null
            ) as Orders,
            (
                select COUNT(*)  from  purchaseorders where purchaseorders.deleted_at is null  and purchaseorders.CustomerId is not null
            ) as AllOrders,
            (
                select COUNT(*) from  adoptions where adoptions.deleted_at is null 
            ) as Adoptions,
            (
                select COUNT(customers.Id) from  customers inner join users on users.id  = customers.id
            ) as Customers
    ";

    const queryCustomer  =  "
    select 
    (
          select COUNT(*) from  purchaseorders where purchaseorders.deleted_at is null and  purchaseorders.State in (3,4,5,6) and purchaseorders.CustomerId is not null
          and  purchaseorders.CustomerId = @customerId
      ) as Orders,
      (
          select COUNT(*) from  adoptions where adoptions.deleted_at is null  and adoptions.CustomerId = @customerId
      ) as Adoptions
  ";

    public static function getEmployee(){
        return DB::select(self::query);
    }

    public static function getCustomer(){
        $query = str_replace('@customerId', Auth::user()->id, self::queryCustomer);
        return DB::select($query);
    }

}
