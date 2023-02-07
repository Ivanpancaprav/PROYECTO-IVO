<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HistoriasClinica
 *
 * @property $n_historia
 * @property $tratamiento
 * @property $fecha_fin
 * @property $fecha_inicio
 * @property $dni_paciente
 * @property $dni_medico
 * @property $created_at
 * @property $updated_at
 *
 * @property ContieneMedicamento[] $contieneMedicamentos
 * @property GestionHistoria[] $gestionHistorias
 * @property Informe[] $informes
 * @property Medico $medico
 * @property Paciente $paciente
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class HistoriasClinica extends Model
{
    
    static $rules = [
		'n_historia' => 'required',
		'tratamiento' => 'required',
		'fecha_fin' => 'required',
		'fecha_inicio' => 'required',
		'dni_paciente' => 'required',
		'dni_medico' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['n_historia','tratamiento','fecha_fin','fecha_inicio','dni_paciente','dni_medico'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contieneMedicamentos()
    {
        return $this->hasMany('App\Models\ContieneMedicamento', 'n_historia', 'n_historia');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gestionHistorias()
    {
        return $this->hasMany('App\Models\GestionHistoria', 'n_historia', 'n_historia');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function informes()
    {
        return $this->hasMany('App\Models\Informe', 'n_historia', 'n_historia');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function medico()
    {
        return $this->hasOne('App\Models\Medico', 'dni_medico', 'dni_medico');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paciente()
    {
        return $this->hasOne('App\Models\Paciente', 'dni_paciente', 'dni_paciente');
    }
    

}
