<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 20 Nov 2017 01:48:24 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Provider
 * 
 * @property int $Id
 * @property int $created_by
 * @property \Carbon\Carbon $created_at
 * @property int $updated_by
 * @property \Carbon\Carbon $updated_at
 * @property int $deleted_by
 * @property string $deleted_at
 * @property int $Status
 * @property bool $Deleted
 * @property string $Name
 * @property string $DocumentType
 * @property string $Document
 *
 * @package App\Models
 */
class Provider extends Eloquent
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
		'created_by',
		'updated_by',
		'deleted_by',
		'Status',
		'Deleted',
		'Name',
		'DocumentType',
		'Document'
	];
}
