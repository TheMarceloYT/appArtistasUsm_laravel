@extends('master.master')

@section('contenido')

{{-- titulo --}}
<h1 class="mx-auto bg-warning text-white fw-bold p-2 rounded text-center" style="max-width: 300px;">VER PERFIL</h1>

{{-- informacion de cuenta --}}
<div class="mt-3">
  {{-- card del user --}}
  <div class="card border-0 p-0">
    <div class="row align-items-center">
      <div class="col-auto mx-auto">
        <img src={{asset('storage/'.$cuenta->imagen)}} class="border border-warning border-2 rounded-circle" 
          width="200px" height="200px">
      </div>
      <div class="col-md-7 bg-primary rounded text-white mt-2 mt-md-0">
        <div class="card-body">
          <h5 class="card-title fs-1 fw-bold">{{'@'.$cuenta->user}}</h5>
          <p class="card-text fs-3 fw-bold">{{$cuenta->nombre.' '.$cuenta->apellido}}</p>
          <p class="card-text fs-4">{{$cuenta->gmail}}</p>
          <p><b>{{$rol->nombre}}</b>{{' | Ingresado el '}}<b>{{ date('d-m-Y', strtotime($cuenta->create_at)) }}</b></p>
        </div>
      </div>
      {{-- spacer --}}
      <div class="d-none d-md-inline col-md-1"></div>
    </div>
  </div>
</div>

@endsection