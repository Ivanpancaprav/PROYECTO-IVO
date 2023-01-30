<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Medico
 * 
 * @property string $dni_medico
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $n_colegiado
 * 
 * @property User $user
 * @property Collection|GestionHistoria[] $gestion_historias
 * @property Collection|HistoriasClinica[] $historias_clinicas
 * @property Collection|MedicamentosRecetado[] $medicamentos_recetados
 *
 * @package App\Models
 */
class Medico extends Model
{
	static $rules = [
		'n_colegiado' => 'required',
    ];

	protected $perPage = 20;

	protected $fillable = [
		'n_colegiado'
	];

	public function user()
	{
        return $this->hasOne('App\Models\User', 'dni', 'dni_medico');
	}

	public function gestion_historias()
	{
		return $this->hasMany('App\Models\GestionHistoria', 'dni_paciente', 'dni_paciente');
	}

	public function historias_clinicas()
	{
		return $this->hasMany('App\Models\HistoriasClinica', 'dni_paciente', 'dni_paciente');
	}

	public function medicamentos_recetados()
	{
		return $this->hasMany('App\Models\Medicamento', 'dni_paciente', 'dni_paciente');
	}
}
