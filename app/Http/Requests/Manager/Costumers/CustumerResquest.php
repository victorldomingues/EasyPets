<?php

namespace App\Http\Requests\Manager\Custumers;

use Illuminate\Foundation\Http\FormRequest;

class CustumersRequest extends FormRequest
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
		'Birthday',
		'PublicPlace',
		'ZipCode',
		'Number',
		'Neighborhood',
		'City',
		'State',
		'Country',
		'Complement',
		'Lat',
		'Long',
		'PaymentPreference'
	];
}
