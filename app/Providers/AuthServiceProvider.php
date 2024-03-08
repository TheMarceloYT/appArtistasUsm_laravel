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
            //true si el nombre del rol es Administrador (uso eloquent)
            return $usuario->rol->nombre == 'Administrador';
        });

        //crear usuario {admin}
        Gate::define('usuarios_crear', function($usuario){
            //true si el nombre del rol es Administrador (uso eloquent)
            return $usuario->rol->nombre == 'Administrador';
        });

        //crear publicación
        Gate::define('imagenes-crear', function($usuario){
            //true si el nombre del rol es Artista (uso eloquent)
            return $usuario->rol->nombre == 'Artista';
        });

        //administrar publicaciones
        Gate::define('imagenes-admin', function($usuario){
            //true si el nombre del rol es Administrador (uso eloquent)
            return $usuario->rol->nombre == 'Administrador';
        });
    }
}
