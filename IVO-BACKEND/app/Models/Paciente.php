<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Paciente
 * 
 * @property string $dni_paciente
 * @property int|null $n_seguridad_social
 * @property int|null $n_historial_clinico
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property Collection|Cita[] $citas
 * @property Collection|HistoriasClinica[] $historias_clinicas
 *
 * @package App\Models
 */
class Paciente extends Model
{
	protected $table = 'pacientes';
	protected $primaryKey = 'dni_paciente';
	public $incrementing = false;

	protected $casts = [
		'n_seguridad_social' => 'int',
		'n_historial_clinico' => 'int'
	];

	protected $fillable = [
		'dni_paciente',
		'n_seguridad_social',
		'n_historial_clinico'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'dni_paciente');
	}

	public function citas()
	{
		return $this->hasMany(Cita::class, 'dni_paciente');
	}

	public function historias_clinicas()
	{
		return $this->hasMany(HistoriasClinica::class, 'dni_paciente');
	}
}
