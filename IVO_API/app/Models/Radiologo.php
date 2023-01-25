<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Radiologo
 * 
 * @property string $dni_radiologo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Radiologo extends Model
{
	protected $table = 'radiologos';
	protected $primaryKey = 'dni_radiologo';
	public $incrementing = false;

	public function user()
	{
		return $this->belongsTo(User::class, 'dni_radiologo');
	}
}