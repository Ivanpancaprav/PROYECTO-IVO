<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ContieneMedicamento
 * 
 * @property int $id_contiene_medicamentos
 * @property int $n_historia
 * @property int $id_medicamento
 * @property Carbon $fecha_receta
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Medicamento $medicamento
 * @property HistoriasClinica $historias_clinica
 *
 * @package App\Models
 */
class ContieneMedicamento extends Model
{
	protected $table = 'contiene_medicamentos';
	protected $primaryKey = 'id_contiene_medicamentos';

	protected $casts = [
		'n_historia' => 'int',
		'id_medicamento' => 'int'
	];

	protected $dates = [
		'fecha_receta'
	];

	protected $fillable = [
		'n_historia',
		'id_medicamento',
		'fecha_receta'
	];

	public function medicamento()
	{
		return $this->belongsTo(Medicamento::class, 'id_medicamento');
	}

	public function historias_clinica()
	{
		return $this->belongsTo(HistoriasClinica::class, 'n_historia');
	}
}
