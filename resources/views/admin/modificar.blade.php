@extends('master.master')

@section('contenido')

{{-- cuenta y listado de roles --}}
<div class="row g-0 justify-content-center">
  {{-- cuenta --}}
  <div class="col-lg-8">
    <h3 class="bg-warning rounded p-2 text-white text-center">CUENTA A MODIFICAR</h3>
    {{-- formulario --}}
    <div class="card border-warning rounded">
      <div class="card bg-body">
        <div class="card-body text-body-emphasis">
          <form method="POST" action="{{Route('admin.modificar', $cuenta->user)}}" enctype="multipart/form-data">
            @method('PUT')
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
            <div class="mb-1 text-white bg-warning text-center border border-warning rounded">
                <label for="user" class="form-label fw-bold">Modificando a <b class="fs-5">{{'@'.$cuenta->user}}</b></label>
            </div>
            <div class="mb-1">
              <label for="nombre" class="form-label fw-bold">Nombre</label>
              <input value="{{$cuenta->nombre}}" type="text" id="nombre" name="nombre" class="form-control border border-warning rounded">
            </div>
            <div class="mb-1">
              <label for="apellido" class="form-label fw-bold">Apellido</label>
              <input value="{{$cuenta->apellido}}" type="text" id="apellido" name="apellido" class="form-control border border-warning rounded">
            </div>
            <div class="mb-1">
              <label for="email" class="form-label fw-bold">Correo</label>
              <input value="{{$cuenta->gmail}}" type="text" id="gmail" name="gmail" class="form-control border border-warning rounded">
            </div>
            <div class="mb-1">
              <label for="id" class="form-label fw-bold">ID del rol</label>
              <input value="{{$cuenta->id_rol}}" type="text" id="id" name="id" class="form-control border border-warning rounded">
            </div>
            <div class="mb-1">
              <label for="imagen" class="form-label fw-bold">Imagen de perfil (si no quiere modificarla, no ponga nada)</label>
              <input type="file" id="imagen" name="imagen" class="form-control border border-warning rounded">
            </div>
            <div class="pt-1 text-center text-sm-end">
                <a href={{Route('admin.listar')}} class="btn btn-danger fw-bold">Cancelar</a>
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
  <div class="col-lg-3 overflow-x-scroll mt-2 mt-lg-0" style="max-width: 300px;">
    <h3 class="bg-warning rounded p-2 text-white text-center">ROLES</h3>
    <table class="table table-hover table-responsive">
      <thead>
        <tr>
          <th scope="col" class="bg-primary text-white fw-bold">ID</th>
          <th scope="col" class="bg-primary text-white fw-bold">NOMBRE</th>
        </tr>
      </thead>
      <tbody>
        @foreach($roles as $num => $r)
        <tr>
          <th class="text-body-emphasis" scope="row">{{$r->id}}</th>
          <td class="text-body-emphasis">{{$r->nombre}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>

@endsection