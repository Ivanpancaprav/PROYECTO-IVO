<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Paciente
 *
 * @property $dni_paciente
 * @property $n_seguridad_social
 * @property $n_historial_clinico
 * @property $created_at
 * @property $updated_at
 *
 * @property Cita[] $citas
 * @property HistoriasClinica[] $historiasClinicas
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Paciente extends Model
{   

    
    static $rules = [
		'n_seguridad_social' => 'required',
		'n_historial_clinico' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['n_seguridad_social','n_historial_clinico'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function citas()
    {
        return $this->hasMany('App\Models\Cita', 'dni_paciente', 'dni_paciente');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historiasClinicas()
    {
        return $this->hasMany('App\Models\HistoriasClinica', 'dni_paciente', 'dni_paciente');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'dni', 'dni_paciente');
    }
    

}
