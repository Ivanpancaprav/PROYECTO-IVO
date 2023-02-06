<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();

        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(User::$rules);
        
        $user = User::create($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $dni
     * @return \Illuminate\Http\Response
     */
    public function show($dni)
    {
        $user =(object) User::whereDni($dni)->get()->toArray()[0];
       
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $dni
     * @return \Illuminate\Http\Response
     */
    public function edit($dni)
    {
        $user =(object) User::whereDni($dni)->get()->toArray()[0];
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validacion = $request->validate([
            'dni' => 'required',
            'nombre' =>'required',
            'apellido1' =>'required',
            'apellido2' =>'required',
            'direccion' =>'required',
            'email' =>'required',
            'sexo' =>'required',
            'password' =>'required',
            'role' =>'required',
            'fecha_nacimiento' =>'required',
        ]);

        User::whereDni($request->dni)->update($validacion);
        
                return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($dni)
    {
        $user = User::where('dni',$dni);

        $user->delete();
        
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }

    public function codeaguardar(Request $request){
        $post = new Post();
        $post->nombre = $request->nombre;
        if($request->hasFile("imagen")){

            $imagen = $request->file("imagen");
            $nombreimagen = Str::slug($request->nombre).".".$imagen->guessExtension();
            $ruta = public_path("img/post/");
            copy($imagen->getRealPath(),$ruta.$nombreimagen);
            $post->imagen = $nombreimagen;            
            
        }
        $post->save();
        
    }
}
