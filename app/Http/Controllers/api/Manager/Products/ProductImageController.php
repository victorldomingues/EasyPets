<?php
 namespace App\Http\Controllers\api\Manager\Products;
 
     use Illuminate\Http\Request;
     use App\Http\Controllers\Controller;
     use Illuminate\Support\Facades\Auth;
     use App\Models\Productimage;
     use Response;
     use DateTime;

class ProductImageController extends Controller
{
    public function __construct()
    {
        
    }
    public function removeimage($id)
    {
        $product = Productimage::findOrFail($id);
        $product->deleted       = 1;
        $product->deleted_at    = new DateTime();
        $product->save();
        return response()->json('{"isValid": true}');
    }

    public function details()
    {
    }
}
