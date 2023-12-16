@extends('master.master')

@section('contenido')

<!-- imagen y form de comentario -->
<div class="row-cols-lg-auto d-lg-flex">
  <!-- imagen -->
  <div class="col-lg-5 d-flex align-items-center justify-content-center pe-lg-4">
    <div class="card bg-white ms-4 align-items-center justify-content-center" style="width: 24rem; height: 30rem;">
      <!-- imagen -->
      <img style="width: 24rem; height: 15rem;" src={{asset('storage/'.$imagen->imagen)}} class="card-img-top">
      <div class="card-body text-center">
        <!-- titulo -->
        <h5 class="card-title text-black"><b>"{{$imagen->titulo}}"</b></h5>
        <!-- autor -->
        <h5 class="text-black">{{'@'.$imagen->user_fk}}</h5>
        <!-- descripcion -->
        <p class="card-text" style="width: 21rem; height: 7rem;">{{$imagen->descripcion}}</p>
        <!-- likes y comentar -->
        <div class="position-relative" style="padding-top: 1rem;">
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
  <!-- formulario -->
  <div class="card col-lg-6 border mt-sm-5 mb-sm-5 border-primary">
    <form method="POST" action="{{Route('comentarios.subir', $imagen->id)}}">
      @method('POST')
      @csrf
      <!-- titulo form -->
      <div class="card-header bg-primary">
        <h4 class="form-label text-white fw-bold">Comentar imagen</h4>
      </div>
      <!-- cuerpo del form -->
      <div class="p-3 text-black fw-bold">
        <div class="mb-3">
          <label for="comentario" class="form-label fs-4">Comentario</label>
          <input type="text" class="form-control border-warning" name="comentario" id="comentario" style="height: 5rem;">
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input border-warning" style="height: 1.5rem; width: 1.5rem;" name="megusta" id="megusta">
          <label class="form-check-labe fs-5 ms-2" for="megusta">Me gusta</label>
        </div>
        <div class="mt-lg-3">
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
<!-- comentarios -->
<div class="row container-fluid mt-lg-4">
  @if(count($imagen->comentario) != 0)
    <div class="col-lg-2"></div>
    <h1 class="col-lg-8 bg-warning text-white fw-bold p-2 rounded text-center" style="width: 30rem;">COMENTARIOS</h1>
    <div class="col-lg-2"></div>
    @foreach($comentarios as $num => $com)
      @foreach($cuentas as $num => $c)
        @if($com->user_fk == $c->user)
          <div class="row mt-2">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 card border border-warning bg-white">
              {{-- imagen del user --}}
              <div class="d-flex">
                <div style="width: 5rem;">
                  <img class="border border-warning rounded-circle my-2" style="width: 5rem; height: 5rem;" 
                  src="{{asset('storage/'.$c->imagen)}}">
                </div>
                {{-- nombre y comentario del user --}}
                <div class="ps-3">
                  <div class="d-flex">
                    <a class="link-underline link-underline-opacity-0" 
                      href={{Route('cuentas.perfil', $com->user_fk)}} >
                      <h3 class="text-black">{{'@'.$com->user_fk}}</h3></a>
                    <h6 class="ms-1 pt-2 text-black">publicado el {{$com->create_at}}</h6>
                  </div>
                  <p class="text-black text-break ms-2">{{$com->comentario}}</p>
                </div>
              </div>
            </div>
            <div class="col-lg-2"></div>
          </div>
        @endif
      @endforeach
    @endforeach
  @else
    <div class="col-lg-4"></div>
    <h1 class="col-lg-6 bg-warning text-white fw-bold p-2 rounded text-center" style="width: 30rem;">NO HAY COMENTARIOS</h1>
    <div class="col-lg-2"></div>
  @endif
</div>

@endsection