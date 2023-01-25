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
	protected $table = 'medicos';
	protected $primaryKey = 'dni_medico';
	public $incrementing = false;

	protected $fillable = [
		'n_colegiado'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'dni_medico');
	}

	public function gestion_historias()
	{
		return $this->hasMany(GestionHistoria::class, 'dni_medico');
	}

	public function historias_clinicas()
	{
		return $this->hasMany(HistoriasClinica::class, 'dni_medico');
	}

	public function medicamentos_recetados()
	{
		return $this->hasMany(MedicamentosRecetado::class, 'dni_medico');
	}
}
