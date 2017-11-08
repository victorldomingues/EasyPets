<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 Nov 2017 22:56:50 +0000.
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
 *
 * @package App\Models
 */
class User extends Eloquent
{
	protected $casts = [
		'Type' => 'int'
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
		'Cpf'
	];
}
