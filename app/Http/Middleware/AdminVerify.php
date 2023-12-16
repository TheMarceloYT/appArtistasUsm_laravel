<?php

namespace App\Http\Middleware;

use App\Models\Rol;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //el user está logeado?
        if(Auth::check())
        {
            //logeado, es admin?
            $rol = Rol::where('id', Auth::user()->id_rol)->get('nombre');
            $rol = json_decode($rol, true);
            $nombre = $rol[0]['nombre'];
            if($nombre == 'Administrador')
            {
                //es admin, pasa a la vista o proceso
                return $next($request);
            }
            //está logeado pero no es admin, redirecciono al home
            return redirect()->route('home.index');
        }
        //no está logeado, redirecciono al login
        return redirect()->route('cuentas.login');
    }
}
