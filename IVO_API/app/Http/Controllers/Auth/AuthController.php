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
    
       if (Auth::attempt(array('email' =>$credentials['email'],'password' =>$credentials['password']))) {  //comprobación de autenticación 
        return redirect()->route('auth.admin');  //nos redirije a la ruta 'admin'
        
    } else {

           session()->flash('message', 'Invalid credentials');
           return redirect()->back();
       }
   }

   public function registro(Request $request)
   {
       $request->validate([
           'name' => 'required',
           'dni' => 'required',
           'password' => 'required',
           'role' =>'required'
       ]);

       $user = User::create([
           'name' => trim($request->input('name')),
           'dni' => strtolower($request->input('email')),
           'role' => strtolower($request->input('role')),
           'password' => bcrypt($request->input('password')),
       ]);

       return redirect()->route('auth.admin');   //te redirije al menú admin o podría ser paciente...
   }

   public function logout(Request $request)
   {
    
       $request->session()->flush();
       Auth::logout();
       return redirect('login');
   }

   public function admin(){
    return view('auth.admin');
   }
   public function paciente(){
    return view('paciente');
   }


}
