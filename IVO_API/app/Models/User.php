<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @property $dni
 * @property $nombre
 * @property $apellido1
 * @property $apellido2
 * @property $direccion
 * @property $email
 * @property $email_verified_at
 * @property $sexo
 * @property $role
 * @property $fecha_nacimiento
 * @property $password
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @property Medico $medico
 * @property Paciente $paciente
 * @property Radiologo $radiologo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Model
{
    
    
    static $rules = [
		'dni' => 'required',
		'nombre' => 'required',
		'apellido1' => 'required',
		'direccion' => 'required','email', 'max:255', 'unique:users',
        'password' =>'required','min:8',
		'email' => 'required',
		'sexo' => 'required',
		'role' => 'required',
		'fecha_nacimiento' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dni','nombre','apellido1','apellido2','direccion','foto', 'password','email','sexo','role','fecha_nacimiento'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function medico()
    {
        return $this->hasOne('App\Models\Medico', 'dni_medico', 'dni');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paciente()
    {
        return $this->hasOne('App\Models\Paciente', 'dni_paciente', 'dni');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function radiologo()
    {
        return $this->hasOne('App\Models\Radiologo', 'dni_radiologo', 'dni');
    }
    

}
