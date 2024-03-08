@extends('master.master')

@section('contenido')

{{-- titulo imagenes y filtro --}}
<div class="d-md-flex fw-bold align-items-md-center">
  <h3 class="bg-warning text-center rounded p-2 text-white">IMAGENES</h3>
  {{-- filtro --}}
  <div class="ms-md-auto">
    <div class="d-flex justify-content-center align-content-center">
      <h3 class="text-body-emphasis fw-bold me-2 d-none d-sm-inline">Filtrar por artista</h3>
      <form method="GET" action="{{Route('imagenesFiltro.process')}}">
        @method('get')
        @csrf
        {{-- opciones --}}
        <select id="user" name="user" class="bg-primary text-white p-1 rounded fw-bold">
          @foreach($artistas as $artista)
            <option class="fw-bold" value="{{$artista->user}}">{{$artista->user}}</option>
          @endforeach
        </select>
        {{-- btn filtro --}}
        <button class="btn btn-warning text-white fw-bold ms-2 mb-1 p-1" type="submit">
          Buscar
        </button>
      </form>
    </div>
  </div>
</div>

{{-- imagenes y modal --}}
<div class="row g-0">
  @foreach($imagenesFiltradas as $img)
    {{-- Modal de borrado --}}
    <div class="modal fade" id="BorradoModal{{$img->id}}" tabindex="-1" aria-labelledby="BorradoModal{{$img->idr}}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h1 class="modal-title fs-5 text-white fw-bold" id="BorradoModal">Confirmación de borrado</h1>
          </div>
          {{-- formulario --}}
          <form method="POST" action="{{Route('admin.borrarPublicacion', $img->id)}}">
            @method('DELETE')
            @csrf
            <div class="modal-body d-flex">
              <p class="fs-5 text-body-emphasis fw-bold">¿Está seguro de borrar la publicación <b class="text-danger">{{$img->titulo}}</b>?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary fw-bold text-white" data-bs-dismiss="modal">CANCELAR</button>
              <button type="submit" class="btn btn-danger fw-bold text-white">BORRAR</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    {{-- cuerpo de las imagenes --}}
    <div class="card bg-body mx-auto mt-3 align-items-center justify-content-center" 
      style="max-width: 400px;" id="carta_custom">
      {{-- imagen --}}
      <img class="card-img-top" src={{asset('storage/'.$img->imagen)}} style="height: 250px;">
      <div class="row card-body text-body-emphasis text-center mx-1">
        {{-- titulo --}}
        <h5 class="card-title"><b>"{{$img->titulo}}"</b></h5>
        {{-- autor --}}
        <h5>{{'@'.$img->user_fk}}</h5>
        {{-- descripcion --}}
        <p class="card-text" style="height: 140px;">{{$img->descripcion}}</p>
        {{-- likes y comentar --}}
        <div class="position-relative pt-4">
          {{-- likes --}}
          <div class="position-absolute bottom-0 start-0">
            <img src={{asset('bootstrap_icons/hand-thumbs-up-fill.svg')}}>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
              {{$img->likes}}
            </span>
          </div>
          {{-- opciones --}}
          @if(Auth::check())
            <div class="dropup-center position-absolute bottom-0 start-50 translate-middle-x">
              <button class="bg-body border-0 text-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" 
                aria-expanded="false">
                <img src={{asset('bootstrap_icons/card-list.svg')}}>
                <ul class="dropdown-menu bg-body border-warning text-center">
                  <li>
                    <a class="dropdown-item text-body-emphasis fw-bold rounded" id="item-dropdown" href="/">
                      Añadir a favoritos
                    </a>
                  </li>
                  <li><hr class="dropdown-divider bg-warning"></li>
                  @if(Gate::allows('imagenes-admin'))
                    <li>
                      <a type="button" class="dropdown-item text-body-emphasis fw-bold rounded" data-bs-toggle="modal" data-bs-target="#BorradoModal{{$img->id}}"
                        id="item-dropdown">
                        Borrar publicación
                      </a>
                    </li>
                  @endif
                  <li>
                    <a class="dropdown-item text-body-emphasis fw-bold rounded" id="item-dropdown" href="/">
                      Reportar publicación
                    </a>
                  </li>
                </ul>
              </button>
            </div>
          @endif
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