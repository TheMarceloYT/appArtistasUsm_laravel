@extends('master.master')

@section('contenido')

{{-- cuentas y roles --}}
<div class="row g-0 justify-content-center">
  {{-- cuentas --}}
  <div class="col-lg-8 overflow-x-scroll">
    <h3 class="bg-warning border-0 rounded p-2 text-white text-center">CUENTAS</h3>
    <table class="table table-hover table-responsive">
      <thead>
        <tr>
          <th scope="col" class="bg-primary text-white fw-bold">USER</th>
          <th scope="col" class="bg-primary text-white fw-bold">NOMBRE COMPLETO</th>
          <th scope="col" class="bg-primary text-white fw-bold">EMAIL</th>
          <th scope="col" class="bg-primary text-white fw-bold">ID ROL</th>
          <th scope="col" class="bg-primary text-white fw-bold">OPCIONES</th>
        </tr>
      </thead>
      <tbody> 
        @foreach($cuentas as $num => $c)
        {{-- procesos php --}}
        @php
          $btnBorrado = $c->deleted_at != null ? 'disabled' : '';
          $btnAdmin = $c->user == Auth::user()->user ? 'disabled' : '';
          $btnRestaurar = $c->deleted_at == null ? 'disabled' : '';
          $btnAdminRestaurar = $c->user == Auth::user()->user ? 'disabled' : '';
          $btnAdminModificar = $c->user == Auth::user()->user ? 'disabled' : '';
        @endphp
        {{-- Modal de borrado --}}
        <div class="modal fade" id="BorradoModal{{$c->user}}" tabindex="-1" aria-labelledby="BorradoModal{{$c->user}}" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <h1 class="modal-title fs-5 text-white fw-bold" id="BorradoModal">Confirmación de borrado</h1>
              </div>
              {{-- formulario --}}
              <form method="POST" action={{Route('admin.borrar', $c->user)}}>
                @method('DELETE')
                @csrf
                <div class="modal-body d-flex">
                  <p class="fs-5 text-body-emphasis fw-bold">¿Está seguro de borrar a <b class="text-danger">{{$c->user}}</b>?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary fw-bold text-white" data-bs-dismiss="modal">CANCELAR</button>
                  <button type="submit" class="btn btn-danger fw-bold text-white">BORRAR</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        {{-- Modal de restaurado --}}
        <div class="modal fade" id="RestauradoModal{{$c->user}}" tabindex="-1" aria-labelledby="RestauradoModal{{$c->user}}" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <h1 class="modal-title fs-5 text-white fw-bold" id="RestauradoModal">Confirmación de restaurado</h1>
              </div>
              {{-- formulario --}}
              <form method="POST" action={{Route('admin.restaurar', $c->user)}}>
                @method('PUT')
                @csrf
                <div class="modal-body d-flex">
                  <p class="fs-5 text-body-emphasis fw-bold">¿Está seguro de restaurar a <b class="text-success">{{$c->user}}</b>?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary fw-bold text-white" data-bs-dismiss="modal">CANCELAR</button>
                  <button type="submit" class="btn btn-success fw-bold text-white">RESTAURAR</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <tr>
          <th scope="row" class="text-body-emphasis">{{'@'.$c->user}}</th>
          <td class="text-body-emphasis">{{$c->nombre.' '.$c->apellido}}</td>
          <td class="text-body-emphasis">{{$c->gmail}}</td>
          <td class="text-body-emphasis">{{$c->id_rol}}</td>
          <td class="d-flex p-3 p-lg-1">
            {{-- btn borrar --}}
            <button type="button" class="btn btn-danger border-0 rounded p-1 {{$btnBorrado.' '.$btnAdmin}}" title="BORRAR CUENTA" data-bs-toggle="modal" data-bs-target="#BorradoModal{{$c->user}}">
              <img src={{asset('bootstrap_icons/trash-fill.svg')}}>
            </button>
            {{-- btn restaurar --}}   
            <button type="button" class="btn btn-success border-0 rounded p-1 ms-1 {{$btnRestaurar.' '.$btnAdminRestaurar}}" title="RESTAURAR CUENTA" data-bs-toggle="modal" data-bs-target="#RestauradoModal{{$c->user}}">
                <img src={{asset('bootstrap_icons/check2-circle.svg')}}>
              </button>
            {{-- btn modificar --}}
            <a class="btn bg-warning border-0 rounded p-1 ms-1 {{$btnAdminModificar}}" title="MODIFICAR CUENTA" href={{Route('admin.modificarVista', $c->user)}}>
              <img src={{asset('bootstrap_icons/gear-fill.svg')}}>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  {{-- espacer --}}
  <div class="col-lg-1"></div>
  {{-- roles --}}
  <div class="col-lg-3 overflow-x-scroll" style="max-width: 300px;">
    <h3 class="bg-warning border-0 rounded p-2 text-white text-center">ROLES</h3>
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
          <th scope="row" class="text-body-emphasis">{{$r->id}}</th>
          <td class="text-body-emphasis">{{$r->nombre}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

{{-- scripts para el modal
<script>
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
  const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script> --}}

@endsection