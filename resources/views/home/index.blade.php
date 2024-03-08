@extends('master.master')

@section('contenido')

{{-- imagen de presentacion de la pag --}}
<div>
  <img class="d-block w-100" src={{asset('images/presentacion_pag.png')}}>
</div>

{{-- noticias titulo --}}
<div class="mt-4 d-flex fw-bold align-items-center justify-content-center">
  <h3 class="bg-warning border-0 rounded p-2 text-white">NOTICIAS</h3>
  <div class="ms-auto">
    <a class="link-underline link-underline-opacity-0" href={{Route('home.index')}}>
      <div class="d-flex">
        <h3 class="text-body-emphasis me-1">Ver todo</h3>
        {{-- icono --}}
        <img src={{asset('bootstrap_icons/arrow-right-circle-fill.svg')}}>
      </div>
    </a>
  </div>
</div>
{{-- noticias contenido --}}
<div class="row g-0 card-group mt-3 align-items-center justify-content-center">
  {{-- 1 --}}
  <div class="card" style="width: 17rem;" id="carta_custom">
    <img src={{asset('images/noticias/n1.png')}} class="card-img-top">
  </div>
  {{-- 2 --}}
  <div class="card ms-lg-2" style="width: 17rem;" id="carta_custom">
    <img src={{asset('images/noticias/n2.png')}} class="card-img-top">
  </div>
  {{-- 3 --}}
  <div class="card ms-lg-2" style="width: 17rem;" id="carta_custom">
    <img src={{asset('images/noticias/n3.png')}} class="card-img-top">
  </div> 
  {{-- 4 --}}
  <div class="card ms-lg-2" style="width: 17rem;" id="carta_custom"> 
    <img src={{asset('images/noticias/n4.png')}} class="card-img-top">
  </div>
</div>
{{-- noticias contenido 2 --}}
<div class="row g-0 card-group mt-3 align-items-center justify-content-center">
  {{-- 5 --}}
  <div class="card" style="width: 17rem;" id="carta_custom">
    <img src={{asset('images/noticias/n5.png')}} class="card-img-top">
  </div>
  {{-- 6 --}}
  <div class="card ms-lg-2" style="width: 17rem;" id="carta_custom">
    <img src={{asset('images/noticias/n6.png')}} class="card-img-top">
  </div>
  {{-- 7 --}}
  <div class="card ms-lg-2" style="width: 17rem;" id="carta_custom">
    <img src={{asset('images/noticias/n7.png')}} class="card-img-top">
  </div>
  {{-- 8 --}}
  <div class="card ms-lg-2" style="width: 17rem;" id="carta_custom">
    <img src={{asset('images/noticias/n8.png')}} class="card-img-top">
  </div>
</div>

{{-- publicidad usm --}}
<div id="carouselExampleIndicators" class="carousel slide mt-3" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner img-fluid">
    <div class="carousel-item active">
      <img src={{asset('images/publicidad/p1.jpg')}} class="d-block w-100" height="200rem">
    </div>
    <div class="carousel-item">
      <img src={{asset('images/publicidad/p2.jpg')}} class="d-block w-100" height="200rem">
    </div>
    <div class="carousel-item">
      <img src={{asset('images/publicidad/p3.jpg')}} class="d-block w-100" height="200rem">
    </div>
    <div class="carousel-item">
      <img src={{asset('images/publicidad/p4.jpg')}} class="d-block w-100" height="200rem">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

@endsection