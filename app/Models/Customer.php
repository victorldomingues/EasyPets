<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 Nov 2017 22:56:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Customer
 * 
 * @property int $Id
 * @property \Carbon\Carbon $Birthday
 * @property string $PublicPlace
 * @property string $ZipCode
 * @property string $Number
 * @property string $Neighborhood
 * @property string $City
 * @property string $State
 * @property string $Country
 * @property string $Complement
 * @property string $Lat
 * @property string $Long
 * @property int $PaymentPreference
 *
 * @package App\Models
 */
class Customer extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Id' => 'int',
		'PaymentPreference' => 'int'
	];

	protected $dates = [
		'Birthday'
	];

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
