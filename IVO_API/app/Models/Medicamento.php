<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Medicamento
 * 
 * @property int $id_medicamento
 * @property Carbon $fecha_creacion
 * @property string $nombre
 * @property string $dosis
 * @property string $comentarios
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|ContieneMedicamento[] $contiene_medicamentos
 * @property Collection|MedicamentosRecetado[] $medicamentos_recetados
 *
 * @package App\Models
 */
class Medicamento extends Model
{
	static $rules = [
		'nombre' => 'required',
		'dosis' => 'required',
		'fecha_creacion' => 'required',
    ];
	protected $perPage = 20;

	protected $fillable = [
		'nombre',
		'dosis',
		'fecha_creacion'
	];

    
	public function historiaClinica()
	{
		return $this->belongsToMany(HistoriasClinica::class,'contiene_medicamentos','id_medicamento','n_historia');
	}

	public function medicamentos_recetados()
	{
		return $this->hasMany(MedicamentosRecetado::class, 'id_medicamento');
	}
}
