<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
// use PhpParser\Node\Expr\Cast;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
//use Laravel\Sanctum\HasApiTokens;
use Laravel\Passport\HasApiTokens;     
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

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; 

    protected $primaryKey = 'dni';
    protected $keyType = 'string';

    static $rules = [
		'dni' => 'required',
		'nombre' => 'required',
		'apellido1' => 'required',
        'apellido2' => 'required',
		'direccion' => 'required',
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'email' => 'required',
        'password' =>'required','min:8',
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
    public function medico(){
        return $this->hasOne('App\Models\Medico','dni_medico','dni');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paciente()
    {
        return $this->hasOne(Paciente::class, 'dni_paciente', 'dni');
    }
    

    public function getAuthPassword(){
        return $this->password;
    }

}


