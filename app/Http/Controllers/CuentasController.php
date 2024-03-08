<?php

namespace App\Http\Controllers;

use App\Http\Requests\NuevoEstudianteRequest;
use App\Models\Cuenta;
use App\Models\Rol;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CuentasController extends Controller
{
    //comprobar con middleware
    public function __construct(){
        $this->middleware('auth')->except(['iniciarVista', 'iniciar', 'nuevaVista', 'nueva']);
    }

    //vista inicar sesion
    public function iniciarVista()
    {
        return view('cuentas.login');
    }

    //proceso iniciar sesion
    public function iniciar(Request $request)
    {
        $user = trim($request->user);
        $password = trim($request->password);
        
        //intento iniciar sesion
        if(Auth::attempt(['user'=>$user,'password'=>$password])){
            return redirect()->route('home.index');
        }

        //hubo errores
        return back()->withErrors([
            'user' => 'Credenciales Incorrectas',
        ])->onlyInput('user');
    }

    //proceso de cerrar sesion
    public function unlogin()
    {
        Auth::logout();
        return redirect()->Route('home.index');
    }

    //ver perfil
    public function perfil(Cuenta $cuenta)
    {
        $rol = Rol::find($cuenta->id_rol);

        return view('cuentas.perfil', compact(['cuenta', 'rol']));
    }

    //vista de crear cuenta de Estudiante
    public function nuevaVista()
    {
        return view('cuentas.nueva');
    }

    //proceso de crear cuenta de Estudiante
    public function nueva(NuevoEstudianteRequest $request) 
    {
        //instancio nueva cuenta
        $cuenta = new Cuenta();

        $cuenta->user = trim($request->user);
        $cuenta->password = Hash::make($request->password);
        $cuenta->nombre = trim($request->nombre);
        $cuenta->apellido = trim($request->apellido);
        $cuenta->gmail = trim($request->gmail);
        $cuenta->create_at = Carbon::now();

        //saco el id
        $rol = Rol::where('nombre', 'Estudiante')->get('id');
        $rol = json_decode($rol, true);
        $cuenta->id_rol = $rol[0]['id'];

        //guardar img
        $auxImagen = Storage::putFile('public', $request->imagen);
        $imagen = str_replace('public/', '', $auxImagen);
        $cuenta->imagen = trim($imagen);

        //valores para inicar sesion
        $user = $cuenta->user;
        $pass = $request->password;

        //guardar cuenta
        $cuenta->save();

        //iniciar sesion
        Auth::attempt(['user'=>$user, 'password'=>$pass]);

        //vuelvo al home
        return redirect()->route('home.index');
    }
}
