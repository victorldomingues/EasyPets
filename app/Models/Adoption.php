<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 03 Dec 2017 15:02:43 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Adoption
 * 
 * @property int $Id
 * @property int $CustomerId
 * @property int $PetId
 * @property int $created_by
 * @property string $created_at
 * @property int $updated_by
 * @property \Carbon\Carbon $updated_at
 * @property int $deleted_by
 * @property string $deleted_at
 * @property int $Status
 * @property bool $Deleted
 * @property string $MainActivity
 * @property string $WhoWillSupport
 * @property string $AdultsInTheHouse
 * @property bool $AllowPets
 *
 * @package App\Models
 */
class Adoption extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $primaryKey = 'Id';

	protected $casts = [
		'CustomerId' => 'int',
		'PetId' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int',
		'Status' => 'int',
		'Deleted' => 'bool',
		'AllowPets' => 'bool'
	];

	protected $fillable = [
		'CustomerId',
		'PetId',
		'created_by',
		'updated_by',
		'deleted_by',
		'Status',
		'Deleted',
		'MainActivity',
		'WhoWillSupport',
		'AdultsInTheHouse',
		'AllowPets'
	];
}
