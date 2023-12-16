@extends('master.master')

@section('contenido')

<!-- titulo imagenes y filtro -->
<div class="mt-4 d-lg-flex fw-bold">
  <h3 class="bg-warning text-center border rounded p-2 text-white" style="height: 3rem;">IMAGENES</h3>
  <div class="ms-lg-auto d-flex">
    <div class="pt-2 d-flex align-items-center justify-content-lg-center">
      <h3 class="text-black fw-bold text-center me-3">Filtrar por artista</h3>
      <!-- filtro -->
      <form method="GET" action="{{Route('imagenesFiltro.index')}}">
        @method('get')
        @csrf
        <!-- opciones -->
        <select id="user" name="user" class="bg-primary text-white border-warning rounded fw-bold" style="height: 2.5rem; width: 10rem;">
          @foreach($imagenes as $img)
            <option class="fw-bold" value="{{$img->user_fk}}">{{$img->user_fk}}</option>
          @endforeach
        </select>
        <!-- btn filtro -->
        <button class="btn btn-warning text-white fw-bold ms-2" style="width: 5rem; height: 3rem;" type="submit">
          Buscar
        </button>
      </form>
    </div>
  </div>
</div>

<!-- imagenes -->
<div class="row d-flex align-items-center justify-content-center pe-lg-4">
  @foreach($imagenes as $img)
    <div class="card bg-white ms-4 mt-4 align-items-center justify-content-center" style="width: 24rem; height: 30rem;">
      <!-- imagen -->
      <img style="width: 24rem; height: 15rem;" src={{asset('storage/'.$img->imagen)}} class="card-img-top">
      <div class="card-body text-center">
        <!-- titulo -->
        <h5 class="card-title text-black"><b>"{{$img->titulo}}"</b></h5>
        <!-- autor -->
        <h5 class="text-black">{{'@'.$img->user_fk}}</h5>
        <!-- descripcion -->
        <p class="card-text" style="width: 21rem; height: 7rem;">{{$img->descripcion}}</p>
        <!-- likes y comentar -->
        <div class="position-relative" style="padding-top: 1rem;">
          {{-- likes --}}
          <div class="position-absolute bottom-0 start-0">
            <img src={{asset('bootstrap_icons/hand-thumbs-up-fill.svg')}}>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill 
              bg-success">{{$img->likes}}</span>
          </div>
          {{-- comentarios --}}
          <div class="position-absolute bottom-0 end-0">
            <a href={{Route('comentarios.index', $img->id)}} class="link-underline link-underline-opacity-0">
              <img src={{asset('bootstrap_icons/chat-left-fill.svg')}}>
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill 
                bg-danger">{{count($img->comentario)}}</span> 
            </a>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>

@endsection