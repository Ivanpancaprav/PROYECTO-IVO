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
           'dni' => 'required',
           'password' => 'required'
       ]);
       
     

       $credentials = $request->except(['_token']);  //no cogemos el token
    //    dd($credentials);
        if (auth()->attempt($credentials)) {  //comprobación de autenticación 

           return redirect()->route('admin');  //nos redirije a la ruta 'admin'

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
           'password' => 'required'
       ]);

       $user = User::create([
           'name' => trim($request->input('name')),
           'dni' => strtolower($request->input('email')),
           'password' => bcrypt($request->input('password')),
       ]);

       return redirect()->route('admin');   //te redirije al menú admin o podría ser paciente...
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
