<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 Nov 2017 22:56:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Productimage
 * 
 * @property int $Id
 * @property string $OriginalName
 * @property string $ServerName
 * @property string $Path
 * @property string $Extension
 * @property string $Description
 * @property int $ProductId
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
class Productimage extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $primaryKey = 'Id';

	protected $casts = [
		'ProductId' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int',
		'Status' => 'int',
		'Deleted' => 'bool'
	];

	protected $fillable = [
		'OriginalName',
		'ServerName',
		'Path',
		'Extension',
		'Description',
		'ProductId',
		'created_by',
		'updated_by',
		'deleted_by',
		'Status',
		'Deleted'
	];
}
