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
	protected $table = 'medicamentos';
	protected $primaryKey = 'id_medicamento';

	protected $dates = [
		'fecha_creacion'
	];

	protected $fillable = [
		'fecha_creacion',
		'nombre',
		'dosis',
		'comentarios'
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
