<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property string $dni
 * @property string $nombre
 * @property string $apellido1
 * @property string|null $apellido2
 * @property string $direccion
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $sexo
 * @property string $role
 * @property string|null $nacionalidad
 * @property Carbon $fecha_nacimiento
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Medico $medico
 * @property Paciente $paciente
 * @property Radiologo $radiologo
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';
	protected $primaryKey = 'dni';
	public $incrementing = false;

	protected $dates = [
		'email_verified_at',
		'fecha_nacimiento'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'dni',
		'nombre',
		'apellido1',
		'apellido2',
		'direccion',
		'email',
		'email_verified_at',
		'sexo',
		'role',
		'fecha_nacimiento',
		'password',
		'remember_token'
	];

	public function medico()
	{
		return $this->hasOne(Medico::class, 'dni_medico');
	}

	public function paciente()
	{
		return $this->hasOne(Paciente::class, 'dni_paciente');
	}

	public function radiologo()
	{
		return $this->hasOne(Radiologo::class, 'dni_radiologo');
	}
}
