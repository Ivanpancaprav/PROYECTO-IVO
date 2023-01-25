<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HistoriasClinica
 * 
 * @property int $n_historia
 * @property string $tratamiento
 * @property Carbon $fecha_fin
 * @property Carbon $fecha_inicio
 * @property string $dni_paciente
 * @property string $dni_medico
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Medico $medico
 * @property Paciente $paciente
 * @property Collection|ContieneMedicamento[] $contiene_medicamentos
 * @property Collection|GestionHistoria[] $gestion_historias
 *
 * @package App\Models
 */
class HistoriasClinica extends Model
{
	protected $table = 'historias_clinicas';
	protected $primaryKey = 'n_historia';

	protected $dates = [
		'fecha_fin',
		'fecha_inicio'
	];

	protected $fillable = [
		'tratamiento',
		'fecha_fin',
		'fecha_inicio',
		'dni_paciente',
		'dni_medico'
	];

	public function medico()
	{
		return $this->belongsTo(Medico::class, 'dni_medico');
	}

	public function paciente()
	{
		return $this->belongsTo(Paciente::class, 'dni_paciente');
	}

	public function contiene_medicamentos()
	{
		return $this->hasMany(ContieneMedicamento::class, 'n_historia');
	}

	public function gestion_historias()
	{
		return $this->hasMany(GestionHistoria::class, 'n_historia');
	}
}
