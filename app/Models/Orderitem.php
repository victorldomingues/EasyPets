<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 Nov 2017 02:53:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Orderitem
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
 * @property int $OrderId
 * @property int $ProductId
 * @property string $Quantity
 * @property float $UnitPrice
 * @property float $Total
 *
 * @package App\Models
 */
class Orderitem extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $primaryKey = 'Id';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int',
		'Status' => 'int',
		'Deleted' => 'bool',
		'OrderId' => 'int',
		'ProductId' => 'int',
		'UnitPrice' => 'float',
		'Total' => 'float'
	];

	protected $fillable = [
		'created_by',
		'updated_by',
		'deleted_by',
		'Status',
		'Deleted',
		'OrderId',
		'ProductId',
		'Quantity',
		'UnitPrice',
		'Total'
	];
}
