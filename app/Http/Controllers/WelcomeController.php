<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        $products = DB::select("
        select 
            p.Id,
            p.Name,
            p.Slug,
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
            Products p 
            left join Productmodels pm on pm.id = p.ProductModelId 
            left join productcategories pc on pc.id = p.ProductCategoryId
            left join productcolors pco on pco.id = p.ProductColorId
            left join Providers pv on pv.id = p.ProviderId
        where 
            p.deleted_at is null 
        order by 
            p.created_at desc
        LIMIT 4 ");

        $services = DB::select("
        select 
            p.Id,
            p.Name,
            p.Slug,
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
            Products p 
            left join Productmodels pm on pm.id = p.ProductModelId 
            left join productcategories pc on pc.id = p.ProductCategoryId
            left join productcolors pco on pco.id = p.ProductColorId
            left join Providers pv on pv.id = p.ProviderId
        where 
            p.deleted_at is null 
        order by 
            p.created_at desc
        LIMIT 4 ");

        return view('welcome', ['products' => $products, 'services' => $services]);
    }
}