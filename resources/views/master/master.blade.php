<!DOCTYPE html>
<html lang="es">

<!-- Headers -->
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href={{asset("css/bootstrap.css")}}>
  <link rel="stylesheet" href={{asset("css/master/master.css")}}>
  <link rel="shortcut icon" href={{asset("images/usm_ico.png")}}>
  <title>Artistas USM</title>
</head>

<!-- procesos de php -->
@php
  //fondo para las opciones del navbar
  $fondo_naranjo_imagenes = '';
  $fondo_naranjo_inicio = Route::current()->getName() == 'home.index' ? 'rounded bg-warning' : '';
  if(Route::current()->getName() == 'imagenes.index'){
    $fondo_naranjo_imagenes = 'rounded bg-warning';
  }
  else if(Route::current()->getName() == 'imagenesFiltro.index'){
    $fondo_naranjo_imagenes = 'rounded bg-warning';
  }
  //foto user
  $imagen_user = Auth::check() == true ? ''.Auth::user()->imagen : 'no_loged.png'
@endphp

<!-- cuerpo de la pagina -->
<body>
  <!-- barra de navegacion -->
  <div>
    <nav class="navbar navbar-expand-lg bg-primary border-bottom border-warning">
      <div class="container-fluid">
        <!-- imagen -->
        <a class="navbar-brand" href="https://usm.cl/" target="__blank">
          <img src="{{asset('images/usm_logo.png')}}" height="50">
        </a>
        <!-- toggler hamburguesa -->
        <button class="navbar-toggler border-white" type="button" data-bs-toggle="collapse" 
          data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
          aria-expanded="false" aria-label="Toggle navigation">
          <img src={{asset('images/navbar_toggler.png')}} height="35" width="35">
        </button>
        <!-- opciones -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="transition: ease 400ms;">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active fs-4 text-white fw-bold text-center {{$fondo_naranjo_inicio}}"
                aria-current="page" href={{Route('home.index')}}>INICIO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active fs-4 text-white fw-bold text-center {{$fondo_naranjo_imagenes}}"
                aria-current="page" href={{Route('imagenes.index')}}>IMAGENES</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle fs-4 text-white fw-bold text-center" href="#" 
                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                CONFIGURACIÓN
              </a>
              <ul class="dropdown-menu bg-primary border-warning text-center" style="transition: ease 400ms;">
                @if(Gate::allows('usuarios_listar'))
                  <li><a class="dropdown-item text-white fw-bold rounded" id="item-dropdown" href={{Route('admin.listar')}}>Listar usuarios</a></li>
                @endif
                @if(Gate::allows('usuarios_crear'))
                  <li><a class="dropdown-item text-white fw-bold rounded" id="item-dropdown" href={{Route('admin.nuevaVista')}}>Crear usuario</a></li>
                @endif
                <li><a class="dropdown-item text-white fw-bold rounded" 
                  href="/" id="item-dropdown">Comentar experiencia</a></li>
                <li><hr class="dropdown-divider bg-white"></li>
                <li><a class="dropdown-item text-white fw-bold rounded" id="item-dropdown" 
                  href="https://github.com/TheMarceloYT" target="__blank">Soporte Técnico</a></li>
                <li> 
                  <a class="dropdown-item text-white fw-bold rounded" id="item-dropdown" 
                    href="https://usm.cl/contacto-profesores-funcionarios/" target="__blank">
                    Contacto
                  </a>
                </li>
              </ul>
            </li>
          </ul>
          <!-- user account -->
          <div class="d-flex align-items-center justify-content-center">
            <div class="dropdown me-3">
              <a href="#" class="link-underline link-underline-opacity-0 text-white bg-transparent dropdown-toggle" 
                data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="10,20">
                  <img src={{asset('storage/'.$imagen_user)}} class="border border-warning rounded-circle" width="85rem" height="80rem">
              </a>
              <!-- opciones del user -->
              <ul class="dropdown-menu border-warning dropdown-menu-lg-end bg-primary text-center">
                @if(Auth::check())
                  <li><a class="dropdown-item text-white fw-bold rounded" id="item-dropdown" href={{Route('cuentas.perfil', Auth::user()->user)}}>Ver perfil</a></li>
                @endif
                @if(Auth::guest())
                  <li><a class="dropdown-item text-white fw-bold rounded" id="item-dropdown" href={{Route('cuentas.login')}}>Iniciar Sesión</a></li>
                @endif
                <li><hr class="dropdown-divider bg-white"></li>
                @if(Auth::check())
                  <li><a class="dropdown-item text-white fw-bold rounded" id="item-dropdown" href={{Route('cuentas.unlogin')}}>Cerrar Sesión</a></li>
                @endif
                @if(Auth::guest())
                  <li><a class="dropdown-item text-white fw-bold rounded" id="item-dropdown" href={{Route('cuentas.nuevaVista')}}>Crear cuenta</a></li>
                @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <!-- vistas -->
  <div class="container-fluid my-4">
    @yield('contenido')
  </div>

  <!-- pie de página -->
  <div class="row-cols-auto container-fluid bg-primary border-top border-warning">
    <footer class="pt-5 pb-5 pe-5 ps-5 d-lg-flex text-white align-middle fw-bold">
      <!-- textos -->
      <div class="col-lg-8 text-lg-start text-sm-center">
        <h5>@ Universidad Técnica Federico Santa María</h5>
        <h5>+56 32 2652734 - <a class="link-warning link-offset-1 link-underline link-underline-opacity-0 link-underline-opacity-100-hover" href="/">
          dired@usm.cl</a></h5>
        <h5 class="mt-3">Sitio web administrado por <a class="link-warning link-offset-1 link-underline link-underline-opacity-0 link-underline-opacity-100-hover" 
          href="https://github.com/TheMarceloYT" target="__blank">
          TheMarceloYT</a></h5>
      </div>
      <!-- imagen -->
      <div class="col-lg-4 text-sm-center">
        <img src={{asset('images/usm_cl.png')}} height="90">
      </div>
    </footer>
  </div>

  <!-- javascript -->
  <script src={{asset("js/bootstrap.bundle.js")}}></script>

</body>

</html>