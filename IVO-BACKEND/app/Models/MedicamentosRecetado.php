<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MedicamentosRecetado
 * 
 * @property int $id_receta
 * @property string $dni_medico
 * @property int $id_medicamento
 * @property Carbon $fecha_receta
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Medico $medico
 * @property Medicamento $medicamento
 *
 * @package App\Models
 */
class MedicamentosRecetado extends Model
{
	protected $table = 'medicamentos_recetados';
	protected $primaryKey = 'id_receta';

	protected $casts = [
		'id_medicamento' => 'int'
	];

	protected $dates = [
		'fecha_receta'
	];

	protected $fillable = [
		'dni_medico',
		'id_medicamento',
		'fecha_receta'
	];

	public function medico()
	{
		return $this->belongsTo(Medico::class, 'dni_medico');
	}

	public function medicamento()
	{
		return $this->belongsTo(Medicamento::class, 'id_medicamento');
	}
}
