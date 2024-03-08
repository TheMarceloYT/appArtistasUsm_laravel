<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModificarCuentaRequest;
use App\Http\Requests\NuevaCuentaAdminRequest;
use App\Models\Cuenta;
use App\Models\Imagen;
use App\Models\Rol;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isNull;

class AdminController extends Controller
{
    //comprobar con middleware si es admin
    public function __construct(){
        $this->middleware('admin');
    }

    //vista listar users
    public function listar()
    {
        //data a pasar de las cuentas y roles
        $roles = Rol::all();
        $cuentas = Cuenta::withTrashed()->get();

        return view('admin.listar', compact(['roles', 'cuentas'])); 
    }

    //borrar cuenta {softdelete}
    public function borrar(Cuenta $cuenta)
    {
        $cuenta->delete();
        return redirect()->route('admin.listar');
    }

    //restaurar cuenta
    public function restaurar($cuenta)
    {
        //restauro cuenta
        Cuenta::where('user', $cuenta)->restore();

        return redirect()->route('admin.listar');
    }

    //vista modificar cuenta
    public function modificarVista(Cuenta $cuenta)
    {
        $roles = Rol::all();

        return view('admin.modificar', compact(['cuenta', 'roles']));
    }

    //proceso modificar cuenta
    public function modificar(ModificarCuentaRequest $request, Cuenta $cuenta)
    {
        //asigno nuevos atributos
        $cuenta->nombre = trim($request->nombre);
        $cuenta->apellido = trim($request->apellido);
        $cuenta->gmail = trim($request->gmail);
        $cuenta->id_rol = trim($request->id);
        //modifico imagen?
        if ($request->hasFile('imagen'))
        {
            //si, modifico
            Storage::disk('public')->delete($cuenta->imagen);
            //guardo nueva img
            $auxImagen = Storage::putFile('public', $request->imagen);
            $imagen = str_replace('public/', '', $auxImagen);
            $cuenta->imagen = trim($imagen);
        }
        //guardo y redirecciono
        $cuenta->save();
        return redirect()->route('admin.listar');
    }

    //vista nueva cuenta
    public function nuevaVista()
    {
        $roles =  Rol::all();

        return view('admin.nueva', compact('roles'));
    }

    //proceso nueva cuenta
    public function nueva(NuevaCuentaAdminRequest $request)
    {
        //instancio cuenta
        $cuenta = new Cuenta();

        //asigno atributos
        $cuenta->user = trim($request->user);
        $cuenta->password = Hash::make($request->password);
        $cuenta->nombre = trim($request->nombre);
        $cuenta->apellido = trim($request->apellido);
        $cuenta->gmail = trim($request->gmail);
        $cuenta->create_at = Carbon::now();
        $cuenta->id_rol = $request->id;

        //guardar img
        $auxImagen = Storage::putFile('public', $request->imagen);
        $imagen = str_replace('public/', '', $auxImagen);
        $cuenta->imagen = trim($imagen);

        //guardo y rediecciono
        $cuenta->save();
        return redirect()->route('home.index');
    }

    //borrar publicacion
    public function borrarPublicacion(Imagen $publicacion){
        //borrar publicacion {soft delete}
        $publicacion->delete();
        //redirecciono
        return redirect()->route('imagenes.index');
    }
}
