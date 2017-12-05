<?php

namespace App\Http\Requests\Manager\Adoptions;

use Illuminate\Foundation\Http\FormRequest;

class AdoptionsRequest extends FormRequest
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
		'Status',
		'Deleted',
		'MainActivity',
		'WhoWillSupport',
		'AdultsInTheHouse',
		'AllowPets'
	];
}