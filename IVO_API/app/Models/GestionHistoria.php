<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GestionHistoria
 * 
 * @property int $n_gestion_historias
 * @property string $dni_medico
 * @property int $n_historia
 * @property Carbon $fecha_modificacion
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Medico $medico
 * @property HistoriasClinica $historias_clinica
 *
 * @package App\Models
 */
class GestionHistoria extends Model
{
	protected $table = 'gestion_historias';
	protected $primaryKey = 'n_gestion_historias';

	protected $casts = [
		'n_historia' => 'int'
	];

	protected $dates = [
		'fecha_modificacion'
	];

	protected $fillable = [
		'dni_medico',
		'n_historia',
		'fecha_modificacion'
	];

	public function medico()
	{
		return $this->belongsTo(Medico::class, 'dni_medico');
	}

	public function historias_clinica()
	{
		return $this->belongsTo(HistoriasClinica::class, 'n_historia');
	}
}
