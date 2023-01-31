<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Radiologo
 * 
 * @property string $dni_radiologo
 * @property string $especialidad
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Radiologo extends Model
{


	static $rules = [
		'especialidad' => 'required',
		'dni_radiologo' => 'required',
	    ];

    protected $perPage = 20;

	protected $fillable = [
		'especialidad',
		'dni_radiologo'
	];

	public function user()
	{

		return $this->hasOne('App\Models\User', 'dni', 'dni_radiologo');


	}
}
