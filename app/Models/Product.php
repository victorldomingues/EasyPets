<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 20 Nov 2017 01:48:24 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Product
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
 * @property int $ProductCategoryId
 * @property int $ProductModelId
 * @property int $ProductColorId
 * @property float $UnitPrice
 * @property int $ProviderId
 *
 * @package App\Models
 */
class Product extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $primaryKey = 'Id';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int',
		'Status' => 'int',
		'Deleted' => 'bool',
		'ProductCategoryId' => 'int',
		'ProductModelId' => 'int',
		'ProductColorId' => 'int',
		'UnitPrice' => 'float',
		'ProviderId' => 'int'
	];

	protected $fillable = [
		'Name',
		'Description',
		'created_by',
		'updated_by',
		'deleted_by',
		'Status',
		'Deleted',
		'ProductCategoryId',
		'ProductModelId',
		'ProductColorId',
		'UnitPrice',
		'ProviderId'
	];
}
