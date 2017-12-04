<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;


class ServicesController extends Controller
{
    //
    public function index()
    {
        $services = DB::select("
        select 
            p.Id,
            p.Name,
            p.Description,
            p.created_at,
            p.updated_at,
            p.UnitPrice,
            p.`Status`,
            p.ProductCategoryId,
            p.ProductColorId,
            p.ProductModelId,
            pm.Name as 'ModelName',
            pc.Name as 'CategoryName',
            pco.Name as 'ColorName',
            pv.Name as 'ProviderName',
            (
                SELECT pi.ServerName from productimages pi where pi.deleted_at is null and pi.`Status` = 1 and pi.ProductId = p.Id LIMIT 1
            )as 'Image'
        from 
            products  p
            left join productmodels pm on pm.id = p.ProductModelId 
            left join productcategories pc on pc.id = p.ProductCategoryId
            left join productcolors pco on pco.id = p.ProductColorId
            left join providers pv on pv.id = p.ProviderId
        where 
            p.deleted_at is null 
        order by 
            p.created_at desc 
        ");

        return view('products.services', ['services' => $services]);
    }
}
