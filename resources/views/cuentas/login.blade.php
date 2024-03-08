<!DOCTYPE html>
<html lang="es" data-bs-theme="auto">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{asset("css/bootstrap.css")}}>
    <link rel="shortcut icon" href={{asset("images/usm_ico.png")}}>
    <title>Login Artistas USM</title>
</head>

<body style="background: linear-gradient(to bottom, #198754 43%, #F7AE00 100%);">
    <div class="container-fluid min-vh-100 d-flex flex-column justify-content-lg-center">
        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2">
                <div class="row bg-white">
                    {{-- isotipo --}}
                    <div class="col-12 col-lg-4 bg-primary text-white d-flex flex-column justify-content-center align-items-center">
                        <div class="bg-body p-2 mb-3 rounded">
                            <img src="{{asset('images/usm_ico.png')}}" style="width: 7rem;">
                        </div>
                        <h5 class="text-center">Sistema de Imagenes de artistas USM</h5>
                        <h6 class="text-center">Desarrollado por TheMarceloYT (Marcelo Escobar)</h6>
                    </div>

                    {{-- formulario --}}
                    <div class="col-12 col-lg-8 py-4 bg-body">
                        <h4 class="text-body-emphasis fw-bold fs-3">Inicio de Sesión</h4>
                        <p class="text-body-emphasis mb-2">Proporcione sus credenciales para ingresar al sistema</p>
                        {{-- mensajes de error --}}
                        @if ($errors->any())
                        <div class="alert alert-warning fw-bold">
                            @foreach ($errors->all() as $error)
                              {{ $error }}
                            @endforeach
                        </div>
                        @endif
                        {{-- fin mensajes de error --}}
                        <div class="card border border-warning rounded">
                            <div class="card-body text-body-emphasis">
                                <form method="POST" action={{Route('cuentas.loginProceso')}}>
                                    @csrf
                                    <div class="mb-3">
                                        <label for="user" class="form-label fw-bold">Usuario</label>
                                        <input type="text" id="user" name="user" class="form-control border border-warning rounded">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label fw-bold">Contraseña</label>
                                        <input type="password" id="password" name="password" class="form-control border border-warning rounded">
                                    </div>
                                    <div class="mb-3 text-center text-sm-end">
                                        <a href={{Route('home.index')}} class="btn btn-danger fw-bold">Cancelar</a>
                                        <button type="submit" class="btn btn-success fw-bold">Iniciar Sesión</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src={{asset("js/bootstrap.bundle.js")}}></script>
    <script src={{asset('js/theme.js')}}></script>
</body>

</html>