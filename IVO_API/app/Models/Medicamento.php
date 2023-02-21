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
	protected $table='medicamentos';

	static $rules = [
		'nombre' => 'required',
		'dosis' => 'required',
		'fecha_creacion' => 'required',
    ];
	
	protected $fillable = [
		'nombre',
		'dosis',
		'fecha_creacion'
	];

	public function contiene_medicamentos()
	{
		return $this->hasMany(ContieneMedicamento::class, 'id_medicamento');
	}

	public function medicamentos_recetados()
	{
		return $this->hasMany(MedicamentosRecetado::class, 'id_medicamento');
	}
}
