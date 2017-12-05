<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 03 Dec 2017 15:02:43 +0000.
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
	protected $primaryKey = 'Id';
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
