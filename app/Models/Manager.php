<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 Nov 2017 02:53:18 +0000.
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
	protected $primaryKey = 'Id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Id' => 'int',
		'Role' => 'int'
	];

	protected $fillable = [
		'Role'
	];
}
