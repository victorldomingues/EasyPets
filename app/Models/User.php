<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 03 Dec 2017 15:02:43 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $Type
 * @property string $Cpf
 * @property string $deleted_at
 * @property int $updated_by
 * @property int $deleted_by
 * @property bool $Deleted
 *
 * @package App\Models
 */
class User extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'Type' => 'int',
		'updated_by' => 'int',
		'deleted_by' => 'int',
		'Deleted' => 'bool'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'password',
		'remember_token',
		'Type',
		'Cpf',
		'updated_by',
		'deleted_by',
		'Deleted'
	];
}
