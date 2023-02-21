<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Medicamento
 * 
 * @property int $id_medicamento
 * @property Carbon $fecha_creacion
 * @property string $nombre
 * @property string $cantidad
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
	protected $primaryKey = 'id_medicamento';
	protected $table='medicamentos';

	static $rules = [
		'nombre' => 'required',
		'cantidad' => 'required',
		'fecha_creacion' => 'required',
    ];
	
	protected $fillable = [
		'nombre',
		'cantidad',
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
