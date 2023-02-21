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
    protected $table= 'historias_clinicas';
    protected $primaryKey ='n_historia';
    protected $dates =[
        'fecha_fin',
        'fecha_inicio'
    ];

    static $rules = [
		'tratamiento' => 'required',
        'progreso' =>'required',
		'fecha_inicio' => 'required',
        'fecha_fin' =>'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['progreso','tratamiento','fecha_fin','fecha_inicio'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function contieneMedicamentos()
    // {
    //     return $this->hasMany('App\Models\ContieneMedicamento', 'n_historia', 'n_historia');
    // }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medicamento()
    {
        return $this->belongsToMany(Medicamento::class,'contiene_medicamentos','n_historia','id_medicamento')->withPivot('fecha_fin','fecha_receta');

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
    public function medicos()
    {
        return $this->belongsToMany('App\Models\Medico');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paciente()
    {
        return $this->hasOne('App\Models\Paciente', 'dni_paciente', 'dni_paciente');
    }
    

}
