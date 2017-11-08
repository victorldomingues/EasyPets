<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 Nov 2017 22:56:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Productcategory
 * 
 * @property int $Id
 * @property string $Name
 * @property string $Description
 * @property int $created_by
 * @property \Carbon\Carbon $created_at
 * @property int $updated_by
 * @property \Carbon\Carbon $updated_at
 * @property int $deleted_by
 * @property string $deleted_at
 * @property int $Status
 * @property bool $Deleted
 *
 * @package App\Models
 */
class Productcategory extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $primaryKey = 'Id';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int',
		'Status' => 'int',
		'Deleted' => 'bool'
	];

	protected $fillable = [
		'Name',
		'Description',
		'created_by',
		'updated_by',
		'deleted_by',
		'Status',
		'Deleted'
	];
}
