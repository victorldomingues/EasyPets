<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 03 Dec 2017 15:02:43 +0000.
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
