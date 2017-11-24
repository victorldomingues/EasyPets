<?php

namespace App\Http\Requests\Store\Cart;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    protected $fillable = [
        'Id',
        'Status',
		'Deleted',
		'Cart',
		'CustomerId',
		'State',
		'Ip',
		'ClosedDate',
		'Delivery',
		'Total',
		'SubTotal',
		'Discount',
		'PaymentMethod'
	];
}
