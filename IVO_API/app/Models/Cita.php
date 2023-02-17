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
 * @property string $dni_medico
 * @property Paciente $paciente
 * @property Medico $medico
 * @package App\Models
 */
class Cita extends Model
{
	protected $table = 'citas';
	protected $primaryKey = 'id_cita';

	protected $dates = [
		'fecha_creacion',
		'fecha_fin'
	];

	protected $fillable = [
		'fecha_creacion',
		'fecha_fin',
		'especialidad',
		'descripcion',
	];

	public function paciente()
	{
		return $this->belongsTo(Paciente::class,'dni_paciente','dni_paciente');
	}

	public function medico()
	{
		return $this->belongsTo(Medico::class, 'dni_medico');
	}
}
