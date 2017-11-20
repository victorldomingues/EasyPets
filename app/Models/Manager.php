<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 20 Nov 2017 01:48:24 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Manager
 * 
 * @property int $Id
 * @property int $Role
 *
 * @package App\Models
 */
class Manager extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Id' => 'int',
		'Role' => 'int'
	];

	protected $fillable = [
		'Id',
		'Role'
	];
}
