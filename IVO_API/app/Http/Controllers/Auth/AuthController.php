<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->except(['_token']);  //no cogemos el token


        if (Auth::attempt(array(
            'email' =>$credentials['email'],
            'password' =>$credentials['password']))) {  
            
            return redirect()->route('admin');  //nos redirije a la ruta 'admin'

        } else {

            session()->flash('message', 'Invalid credentials');
            return redirect()->back();
        }
    }

    public function registro(Request $request)
    {


        $request->validate([
            'nombre' => 'required',
            'dni' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $user = User::create([
            'nombre' => trim($request->input('nombre')),
            'dni' => trim($request->input('dni')),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
            'role' => strtolower($request->input('role')),

        ]);

        return redirect()->back();//te redirije al menú admin o podría ser paciente...
    }

    public function logout(Request $request)
    {

        http://localhost/
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }

    public function admin()
    {
        return view('auth.admin');
    }
}
