@extends('master.master')

@section('contenido')

<!-- cuenta y listado de roles -->
<div class="row-cols-sm-auto g-0 d-lg-flex">
  {{-- cuenta --}}
  <div class="col-lg-8">
    <h3 class="bg-warning border rounded p-2 text-white text-center">CREAR CUENTA</h3>
    {{-- formulario --}}
    <div class="card p-1 bg-primary border border-primary">
      <div class="card bg-white border border-warning rounded">
        <div class="card-body">
          <form method="POST" action="{{Route('admin.crear')}}" enctype="multipart/form-data">
            @method('POST')
            @csrf
            {{-- mensajes de error --}}
            @if ($errors->any())
            <div class="alert alert-warning fw-bold">
                @foreach ($errors->all() as $error)
                  {{ $error }}|
                @endforeach
            </div>
            @endif
            {{-- fin mensajes de error --}}
            <div class="mb-1">
              <label for="user" class="form-label fw-bold">Usuario</label>
              <input type="text" id="user" name="user" class="form-control border border-warning rounded">
            </div>
            <div class="mb-1">
              <label for="password" class="form-label fw-bold">Contraseña</label>
              <input type="password" id="password" name="password" class="form-control border border-warning rounded">
            </div>
            <div class="mb-1">
              <label for="nombre" class="form-label fw-bold">Nombre</label>
              <input type="text" id="nombre" name="nombre" class="form-control border border-warning rounded">
            </div>
            <div class="mb-1">
              <label for="apellido" class="form-label fw-bold">Apellido</label>
              <input type="text" id="apellido" name="apellido" class="form-control border border-warning rounded">
            </div>
            <div class="mb-1">
              <label for="email" class="form-label fw-bold">Correo</label>
              <input type="text" id="gmail" name="gmail" class="form-control border border-warning rounded">
            </div>
            <div class="mb-1">
              <label for="id" class="form-label fw-bold">ID del rol</label>
              <input type="text" id="id" name="id" class="form-control border border-warning rounded">
            </div>
            <div class="mb-1">
              <label for="imagen" class="form-label fw-bold">Imagen de perfil</label>
              <input type="file" id="imagen" name="imagen" class="form-control border border-warning rounded">
            </div>
            <div class="pt-1 text-end">
                <a href={{Route('home.index')}} class="btn btn-danger fw-bold">Cancelar</a>
                <button type="submit" class="btn btn-success fw-bold">Crear Cuenta</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  {{-- espacer --}}
  <div class="col-lg-1"></div>
  {{-- roles --}}
  <div class="col-lg-3">
    <h3 class="bg-warning border rounded p-2 text-white text-center">ROLES</h3>
    <table class="table table-hover table-light">
      <thead>
        <tr>
          <th scope="col" class="bg-primary text-white fw-bold">ID</th>
          <th scope="col" class="bg-primary text-white fw-bold">NOMBRE</th>
        </tr>
      </thead>
      <tbody>
        @foreach($roles as $num => $r)
        <tr>
          <th scope="row">{{$r->id}}</th>
          <td>{{$r->nombre}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>

@endsection