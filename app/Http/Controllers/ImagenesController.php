<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComentariosRequest;
use App\Models\Comentario;
use App\Models\Cuenta;
use App\Models\Imagen;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImagenesController extends Controller
{
    //comprobar con middleware
    public function __construct(){
        $this->middleware('auth')->except(['index', 'filtrar']);
    }

    //index
    public function index()
    {
        //imagenes disponibles (eloquent ya quita las borradas)
        $imagenes = Imagen::all();
        //artistas de las imagenes 
        $artistas = Cuenta::has('imagen')->get('user');

        return view('imagenes.index', compact(['imagenes', 'artistas']));
    }

    //procesos de filtrado
    public function filtrarProceso(Request $request){
        return redirect()->route('imagenesFiltro.index', $request->user);
    }

    //filtrador vista
    public function filtrarVista(Cuenta $artista)
    {
        //artistas de las imagenes 
        $artistas = Cuenta::has('imagen')->get('user');
        //imagenes filtradas
        $imagenesFiltradas = Imagen::where('user_fk', $artista->user)->get();

        return view('imagenes.indexFiltro', compact(['artistas', 'imagenesFiltradas']));
    }

    //pagina de comentarios
    public function comentarios(Imagen $imagen)
    {
        //todos los comentarios de la imagen
        $comentarios = Comentario::where('imagen_id', $imagen->id)->get();

        return view('comentarios.index', compact(['imagen', 'comentarios']));
    }

    //subir un comentario
    public function subirComentario(ComentariosRequest $request, Imagen $imagen)
    {
        //instancio comentario
       $comentario = new Comentario();
       //completar comentario
       $comentario->comentario = $request->comentario;
       $comentario->create_at = Carbon::now();
       $comentario->imagen_id = $imagen->id;
       $comentario->user_fk = Auth::user()->user;
       //guardar
       $comentario->save();
       //sumo like a la imagen?
       if($request->megusta) 
       {
        //si lo sumo
        $imagen->likes += 1;
        $imagen->save();
       }
       //redireccionar
       return redirect()->route('imagenes.index');
    }
}
