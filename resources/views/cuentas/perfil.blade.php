@extends('master.master')

@section('contenido')

<!-- titulo -->
<div class="row g-0">
  <div class="col-lg-4"></div>
  <h1 class="col-lg-6 bg-warning text-white fw-bold p-2 rounded text-center" style="width: 30rem;">VER PERFIL</h1>
  <div class="col-lg-2"></div>
</div>

<!-- informacion de cuenta -->
<div class="row mt-3">
  <div class="col"></div>
  {{-- card del user --}}
  <div class="card bg-white border border-warning text-black p-0" style="width: 60rem;">
    <div class="row g-0">
      <div class="col-sm-4">
        <img src={{asset('storage/'.$cuenta->imagen)}} class="img-fluid rounded-start">
      </div>
      <div class="col-sm-8">
        <div class="card-body">
          <h5 class="card-title fs-1 fw-bold">{{'@'.$cuenta->user}}</h5>
          <p class="card-text fs-3 fw-bold">{{$cuenta->nombre.' '.$cuenta->apellido}}</p>
          <p class="card-text fs-4">{{$cuenta->gmail}}</p>
          @foreach($roles as $num => $r)
            @if($r->id == $cuenta->id_rol)
              <p><b>{{$r->nombre}}</b>{{' | Ingresado el '}}<b>{{$cuenta->create_at}}</b></p>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="col"></div>
</div>

@endsection