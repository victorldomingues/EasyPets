<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 Nov 2017 02:53:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Purchaseorder
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
 * @property string $Cart
 * @property int $CustomerId
 * @property int $State
 * @property string $Ip
 * @property \Carbon\Carbon $ClosedDate
 * @property bool $Delivery
 * @property float $Total
 * @property float $SubTotal
 * @property float $Discount
 * @property int $PaymentMethod
 *
 * @package App\Models
 */
class Purchaseorder extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $primaryKey = 'Id';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int',
		'Status' => 'int',
		'Deleted' => 'bool',
		'CustomerId' => 'int',
		'State' => 'int',
		'Delivery' => 'bool',
		'Total' => 'float',
		'SubTotal' => 'float',
		'Discount' => 'float',
		'PaymentMethod' => 'int'
	];

	protected $dates = [
		'ClosedDate'
	];

	protected $fillable = [
		'created_by',
		'updated_by',
		'deleted_by',
		'Status',
		'Deleted',
		'Cart',
		'CustomerId',
		'State',
		'Ip',
		'ClosedDate',
		'Delivery',
		'Total',
		'SubTotal',
		'Discount',
		'PaymentMethod'
	];
}
