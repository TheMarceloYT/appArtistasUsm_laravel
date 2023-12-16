<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Rol;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //listar todos los usuarios {admin}
        Gate::define('usuarios_listar', function($usuario){
            //busco el id del admin
            $rol = Rol::where('nombre', 'Administrador')->get('id');
            $rol = json_decode($rol, true);
            $id = $rol[0]['id'];
            
            return $usuario->id_rol == $id;
        });
    }
}
