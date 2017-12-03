<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 03 Dec 2017 15:02:43 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Pet
 * 
 * @property int $Id
 * @property string $Name
 * @property string $Race
 * @property int $Type
 * @property int $created_by
 * @property \Carbon\Carbon $created_at
 * @property string $Age
 * @property int $updated_by
 * @property \Carbon\Carbon $updated_at
 * @property int $deleted_by
 * @property string $deleted_at
 * @property int $Status
 * @property bool $Deleted
 *
 * @package App\Models
 */
class Pet extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $primaryKey = 'Id';

	protected $casts = [
		'Type' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int',
		'Status' => 'int',
		'Deleted' => 'bool'
	];

	protected $fillable = [
		'Name',
		'Race',
		'Type',
		'created_by',
		'Age',
		'updated_by',
		'deleted_by',
		'Status',
		'Deleted'
	];
}
