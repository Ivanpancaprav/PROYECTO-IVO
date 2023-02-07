<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function login(Request $request)
{
$request->validate([
'dni' => 'required',
'password' => 'required'
]);

$credentials = $request->except(['_token']);

$user = Usuario::where('dni', $request->name)->first();

if (auth()->attempt($credentials)) {

return redirect()->route('principal');

} else {
session()->flash('message', 'Invalid credentials');
return redirect()->back();
}
}
}
