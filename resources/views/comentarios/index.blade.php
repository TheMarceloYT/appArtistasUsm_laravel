@extends('master.master')

@section('contenido')

{{-- imagen y form de comentario --}}
<div class="row g-0 align-items-center">
  {{-- imagen --}}
  <div class="col-lg-5">
    <div class="card bg-body mx-auto" style="max-width: 400px;">
      {{-- imagen --}}
      <img class="card-img-top" src={{asset('storage/'.$imagen->imagen)}} style="height: 250px;">
      <div class="row card-body text-body-emphasis text-center mx-1">
        {{-- titulo --}}
        <h5 class="card-title"><b>"{{$imagen->titulo}}"</b></h5>
        {{-- autor --}}
        <h5>{{'@'.$imagen->user_fk}}</h5>
        {{-- descripcion --}}
        <p class="card-text" style="height: 140px;">{{$imagen->descripcion}}</p>
        {{-- likes y comentar --}}
        <div class="position-relative pt-4">
          {{-- likes --}}
          <div class="position-absolute bottom-0 start-0">
            <img src={{asset('bootstrap_icons/hand-thumbs-up-fill.svg')}}>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill 
              bg-success">{{$imagen->likes}}</span>
          </div>
          {{-- comentarios --}}
          <div class="position-absolute bottom-0 end-0">
            <img src={{asset('bootstrap_icons/chat-left-fill.svg')}}>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill 
              bg-danger">{{count($imagen->comentario)}}
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- formulario --}}
  <div class="card col-lg-7 border mt-3 mt-lg-0 border-primary">
    <form method="POST" action="{{Route('comentarios.subir', $imagen->id)}}">
      @method('POST')
      @csrf
      {{-- titulo form --}}
      <div class="card-header bg-primary">
        <h4 class="form-label text-white fw-bold">Comentar imagen</h4>
      </div>
      {{-- cuerpo del form --}}
      <div class="p-3 text-body-emphasis fw-bold">
        <div class="mb-3">
          <label for="comentario" class="form-label fs-4">Comentario</label>
          <input type="text" class="form-control border-warning" name="comentario" id="comentario" style="height: 5rem;">
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input border-warning" style="height: 1.5rem; width: 1.5rem;" name="megusta" id="megusta">
          <label class="form-check-labe fs-5 ms-2" for="megusta">Me gusta</label>
        </div>
        <div class="mt-lg-3 text-center text-lg-end">
          <a href="{{Route('imagenes.index')}}" class="btn btn-danger fw-bold text-white">Cancelar</a>
          <button type="submit" class="btn btn-success fw-bold text-white ms-2">Comentar</button>
        </div>
      </div>
      {{-- mensajes de error --}}
      @if ($errors->any())
      <div class="alert alert-warning fw-bold">
          @foreach ($errors->all() as $error)
            {{ $error }}
          @endforeach
      </div>
      @endif
      {{-- fin mensajes de error --}}
    </form>
  </div>
</div>
{{-- comentarios --}}
<div class="row g-0 mt-3">
  {{-- hay comentarios? --}}
  @if(count($comentarios) != 0)
    {{-- si hay --}}
    <h1 class="col-auto mx-auto bg-warning text-white fw-bold p-2 rounded text-center" 
      style="max-width: 600px;">COMENTARIOS</h1>
    {{-- comentarios contenido --}}
    @foreach($comentarios as $com)
      <div class="row g-0 mt-2">
        <div class="col mx-auto card bg-primary" id="carta_custom" style="max-width: 1000px;">
          {{-- imagen del user --}}
          <div class="d-flex">
            <div class="mx-2 my-2">
              <img class="border border-2 border-warning rounded-circle" 
                src="{{asset('storage/'.$com->cuenta->imagen)}}" style="width: 70px; height: 70px;">
            </div>
            {{-- nombre y comentario del user --}}
            <div class="w-100">
              <div class="d-sm-flex text-break align-items-sm-baseline">
                <a class="link-underline link-underline-opacity-0" href={{Route('cuentas.perfil', $com->cuenta->user)}} >
                  <h4 class="text-white text-truncate" style="max-width: 50vw;">{{'@'.$com->user_fk}}</h4>
                </a>
                <h6 class="text-white ms-sm-1 w-100 me-sm-1 text-sm-end">{{date('d-m-Y', strtotime($com->create_at))}}</h6>
              </div>
              <p class="text-white text-break">{{$com->comentario}}</p>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  {{-- no hay comentarios --}}
  @else
    <div class="col-lg-4"></div>
    <h1 class="col-lg-6 bg-warning text-white fw-bold p-2 rounded text-center" style="width: 30rem;">NO HAY COMENTARIOS</h1>
    <div class="col-lg-2"></div>
  @endif
</div>
@endsection