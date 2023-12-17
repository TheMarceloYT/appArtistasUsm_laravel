<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\Rol;
use Illuminate\Http\Request;

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
}
