<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cita
 * 
 * @property int $id_cita
 * @property Carbon $fecha_creacion
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $especialidad
 * @property string $descripcion
 * @property string $dni_paciente
 * 
 * @property Paciente $paciente
 *
 * @package App\Models
 */
class Cita extends Model
{
	protected $table = 'citas';
	protected $primaryKey = 'id_cita';

	protected $dates = [
		'fecha_creacion'
	];

	protected $fillable = [
		'fecha_creacion',
		'especialidad',
		'descripcion',
		'dni_paciente'
	];

	public function paciente()
	{
		return $this->belongsTo(Paciente::class, 'dni_paciente');
	}
}
