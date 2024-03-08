<!DOCTYPE html>
<html lang="es" data-bs-theme="auto">

{{-- Headers --}}
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href={{asset("css/bootstrap.css")}}>
  <link rel="stylesheet" href={{asset("css/master/master.css")}}>
  <link rel="shortcut icon" href={{asset("images/usm_ico.png")}}>
  <title>Artistas USM</title>
</head>

{{-- procesos de php --}}
@php
  //nombre de la ruta ACTUAL
  $RutaActual = Route::current()->getName();
  //fondo para las opciones del navbar
  $fondo_naranjo_imagenes = '';
  $fondo_naranjo_inicio = $RutaActual == 'home.index' ? 'rounded bg-warning' : '';
  if($RutaActual == 'imagenes.index'){
    $fondo_naranjo_imagenes = 'rounded bg-warning';
  }
  else if($RutaActual == 'imagenesFiltro.index'){
    $fondo_naranjo_imagenes = 'rounded bg-warning';
  }
  //foto user
  $imagen_user = Auth::check() == true ? ''.Auth::user()->imagen : 'no_loged.png'
@endphp

{{-- cuerpo de la pagina --}}
<body>
  {{-- barra de navegacion --}}
  <div>
    <nav class="navbar navbar-expand-lg fixed-top bg-primary p-1 g-0">
      <div class="container-fluid px-1">
        {{-- imagen {responsiva} --}}
        <a class="navbar-brand d-none d-lg-inline" href="https://usm.cl/" target="__blank" style="max-width: 260px;">
          <img class="img-fluid" src="{{asset('images/usm_logo.png')}}">
        </a>
        <a class="navbar-brand d-lg-none" href="https://usm.cl/" target="__blank" style="max-width: 72px;">
          <img class="img-fluid" src="{{asset('images/usm_logo_escudo.png')}}">
        </a>
        {{-- toggler hamburguesa --}}
        <button class="navbar-toggler border-white" type="button" data-bs-toggle="collapse" 
          data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
          aria-expanded="false" aria-label="Toggle navigation" style="width: 55px; height: 40px;">
          <img class="img-fluid" src={{asset('images/navbar_toggler.png')}}>
        </button>
        {{-- opciones --}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="transition: ease 400ms;">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active fs-5 text-white fw-bold text-center {{$fondo_naranjo_inicio}}"
                aria-current="page" href={{Route('home.index')}}>INICIO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active fs-5 text-white fw-bold text-center {{$fondo_naranjo_imagenes}}"
                aria-current="page" href={{Route('imagenes.index')}}>IMAGENES</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle fs-5 text-white fw-bold text-center" href="#" 
                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                CONFIGURACIÓN
              </a>
              <ul class="dropdown-menu bg-primary border-warning text-center">
                @if(Gate::allows('usuarios_listar'))
                  <li><a class="dropdown-item text-white fw-bold rounded" id="item-dropdown" href={{Route('admin.listar')}}>Listar usuarios</a></li>
                @endif
                @if(Gate::allows('usuarios_crear'))
                  <li><a class="dropdown-item text-white fw-bold rounded" id="item-dropdown" href={{Route('admin.nuevaVista')}}>Crear usuario</a></li>
                @endif
                <li>
                  <a class="dropdown-item text-white fw-bold rounded" 
                    href="/" id="item-dropdown">Comentar experiencia
                  </a>
                </li>
                <li><hr class="dropdown-divider bg-warning"></li>
                <li>
                  <a class="dropdown-item text-white fw-bold rounded" id="item-dropdown" 
                    href="https://github.com/TheMarceloYT" target="__blank">Soporte Técnico
                  </a>
                </li>
                <li> 
                  <a class="dropdown-item text-white fw-bold rounded" id="item-dropdown" 
                    href="https://usm.cl/contacto-profesores-funcionarios/" target="__blank">
                    Contacto
                  </a>
                </li>
              </ul>
            </li>
          </ul>
          {{-- user account --}}
          <div class="d-flex align-items-center justify-content-center">
            <div class="dropdown me-3">
              <a href="#" class="nav-link text-white bg-transparent dropdown-toggle" 
                data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="10,20">
                  <img src={{asset('storage/'.$imagen_user)}} class="border border-warning border-2 rounded-circle" 
                    width="60px" height="60px">
              </a>
              {{-- opciones del user --}}
              <ul class="dropdown-menu border-warning dropdown-menu-lg-end bg-primary text-center">
                @if(Gate::allows('imagenes-crear'))
                  <li><a class="dropdown-item text-white fw-bold rounded" id="item-dropdown" href={{Route('artistas.crearVista')}}>Subir imagen</a></li>
                @endif
                @if(Auth::check())
                  <li><a class="dropdown-item text-white fw-bold rounded" id="item-dropdown" href={{Route('cuentas.perfil', Auth::user()->user)}}>Ver perfil</a></li>
                @endif
                @if(Auth::guest())
                  <li><a class="dropdown-item text-white fw-bold rounded" id="item-dropdown" href={{Route('cuentas.login')}}>Iniciar Sesión</a></li>
                @endif
                <li><hr class="dropdown-divider bg-warning"></li>
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

  {{-- vistas --}}
  <div class="container-fluid" style="padding-top: 85px; padding-bottom: 15px;">
    @yield('contenido')
  </div>

  {{-- pie de página --}}
  <div class="row-cols-auto g-0 container-fluid bg-primary">
    <footer class="p-5 d-lg-flex text-white fw-bold">
      {{-- textos --}}
      <div class="col-lg-8 text-center text-lg-start fs-5">
        <p>@ Universidad Técnica Federico Santa María</p>
        <p>+56 32 2652734 - <a class="link-warning link-offset-1 link-underline link-underline-opacity-0 link-underline-opacity-100-hover" href="/">
          dired@usm.cl</a>
        </p>
        <p class="mt-3">Sitio web administrado por <a class="link-warning link-offset-1 link-underline link-underline-opacity-0 link-underline-opacity-100-hover" 
          href="https://github.com/TheMarceloYT" target="__blank">
          TheMarceloYT</a></p>
      </div>
      {{-- imagen --}}
      <div class="col-lg-4 text-center" style="max-width: 100%;">
        <img class="img-fluid" src={{asset('images/usm_cl.png')}}>
      </div>
    </footer>
  </div>

  {{-- toggle modo oscuro/claro --}}
  <div class="dropdown position-fixed bottom-0 end-0 mb-2 me-2 bd-mode-toggle">
    {{-- btn principal --}}
    <button class="btn bg-body py-2 dropdown-toggle d-flex align-items-center rounded text-warning border-2 border-warning"
      id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
      <img src="{{asset('bootstrap_icons/circle-half.svg')}}" class="theme-icon-active">
      <span class="visually-hidden" id="bd-theme-text">Cambiar tema</span>
    </button>
    {{-- dropdown --}}
    <ul class="dropdown-menu dropdown-menu-end shadow border-2 border-warning" aria-labelledby="bd-theme-text">
      {{-- btn claro --}}
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
          <img src="{{asset('bootstrap_icons/sun-fill.svg')}}" class="me-1 theme-icon">
          Claro
        </button>
      </li>
      {{-- btn oscuro --}}
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
          <img src="{{asset('bootstrap_icons/moon-stars-fill.svg')}}" class="me-1 theme-icon">
          Oscuro
        </button>
      </li>
      {{-- btn auto --}}
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
          <img src="{{asset('bootstrap_icons/circle-half.svg')}}" class="me-1 theme-icon">
          Auto
        </button>
      </li>
    </ul>
  </div>

  {{-- javascript --}}
  <script src={{asset("js/bootstrap.bundle.js")}}></script>
  <script src={{asset('js/theme.js')}}></script>
</body>

</html>