<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComentariosRequest;
use App\Models\Comentario;
use App\Models\Cuenta;
use App\Models\Imagen;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ImagenesController extends Controller
{
    //comprobar con middleware
    public function __construct(){
        $this->middleware('auth')->except(['index', 'filtrar']);
    }

    //index
    public function index()
    {
        //imagenes
        $imagenes = Imagen::all();

        return view('imagenes.index', compact('imagenes'));
    }

    //filtrador
    public function filtrar(Request $request)
    {
        //imagenes filtradas
        $imagenes = Imagen::all();
        $a = $request->user;
        $imagenesFiltradas = Imagen::all()->where('user_fk', $request->user);

        return view('imagenes.indexFiltro', compact(['imagenes', 'imagenesFiltradas']));
    }

    //pagina de comentarios
    public function comentarios(Imagen $imagen)
    {
        $comentarios = Comentario::all()->where('imagen_id', $imagen->id);
        $cuentas = Cuenta::all(); 

        return view('comentarios.index', compact(['imagen', 'comentarios', 'cuentas']));
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
