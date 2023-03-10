<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{

    public $successStatus = 200;
    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function login()
    {
     
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            $success['nombre'] = $user->nombre;
            $success['dni'] = $user->dni;
            $success['apellido1'] =$user->apellido1;
            $success['apellido2'] =$user->apellido2;
            $success['direccion'] =$user->direccion;
            $success['foto'] =$user->foto;
            $success['email'] =$user->email;
            $success['sexo'] =$user->sexo;
            $success['role'] =$user->role;
            $success['fecha_nacimiento'] =$user->fecha_nacimiento;
            switch($user->role){
                case 'paciente':
                    $success['n_seguridad_social'] = $user->paciente->n_seguridad_social;
                    $success['n_historial_clinico'] = $user->paciente->n_historial_clinico;
                    break;

            }
            return response()->json(['success' => $success], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

 

    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'dni' =>'required',
            'apellido1'=>'required'
        ]);

        // dd($validator);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['nombre'] =  $user->nombre;
        return response()->json(['success' => $success], $this->successStatus);
    }
    /** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }



    public function logout(Request $request)
    {
        
        $isUser = $request->user()->token()->revoke();
        if($isUser){
            $success['message'] = "Successfully logged out.";
            return response()->json(['success' => $isUser], $this->successStatus);
        }
        else{
            return response()->json(['error' => 'Unauthorised'], 401);
        }
            
        
    }
}