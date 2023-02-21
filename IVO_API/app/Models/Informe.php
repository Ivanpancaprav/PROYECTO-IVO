<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Informe
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Informe extends Model
{
	protected $table = 'informes';
	protected $fillable = ['observaciones', 'fecha_creacion', ];

	public function historias_clinicas()
	{
		return $this ->belongsTo('App\Models\HistoriasClinicas', 'n_historia', 'n_historia');
	}
}

