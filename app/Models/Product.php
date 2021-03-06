<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 03 Dec 2017 15:02:43 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Product
 * 
 * @property int $Id
 * @property string $Name
 * @property string $Description
 * @property string $Slug
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
 * @property int $Type
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
		'ProviderId' => 'int',
		'Type' => 'int'
	];

	protected $fillable = [
		'Name',
		'Description',
		'created_by',
		'updated_by',
		'deleted_by',
		'Status',
		'Deleted',
		'Slug',
		'ProductCategoryId',
		'ProductModelId',
		'ProductColorId',
		'UnitPrice',
		'ProviderId',
		'Type'
	];
}
