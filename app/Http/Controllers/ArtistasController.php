<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicacionRequest;
use App\Models\Imagen;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtistasController extends Controller
{
    
    //comprobar con middleware si es artista
    public function __construct(){
        $this->middleware('artist');
    }

    //vista para crear una publicacion de artista
    public function crearVista(){
        return view('artista.crear');
    }

    //subir publicación
    public function crear(PublicacionRequest $request){
        //declaro nueva publicacion
        $publicacion = new Imagen();
        //lleno atributos
        $publicacion->titulo = trim($request->titulo);
        $publicacion->descripcion = trim($request->descripcion);
        $publicacion->likes = 0;
        $publicacion->create_at = Carbon::now();
        $publicacion->user_fk = Auth::user()->user;
        //guardar img
        $auxImagen = Storage::putFile('public', $request->imagen);
        $imagen = str_replace('public/', '', $auxImagen);
        $publicacion->imagen = trim($imagen);
        
        //guardo nueva publicacion y redirecciono
        $publicacion->save();
        return redirect()->route('imagenes.index');
    }
}
