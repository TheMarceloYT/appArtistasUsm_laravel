<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtistasController;
use App\Http\Controllers\CuentasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//home
Route::get('/', [HomeController::class, 'index'])->name('home.index');

//imagenes
Route::get('/imagenes', [ImagenesController::class, 'index'])->name('imagenes.index');
Route::get('/imagenes/filtrar', [ImagenesController::class, 'filtrarProceso'])->name('imagenesFiltro.process');
Route::get('/imagenes/filtradas/{artista}', [ImagenesController::class, 'filtrarVista'])->name('imagenesFiltro.index');

//comentarios
Route::middleware('auth')->get('/imagenes/comentarios/{imagen}', [ImagenesController::class,  'comentarios'])->name('comentarios.index');
Route::middleware('auth')->post('/comentarios/subir/{imagen}', [ImagenesController::class, 'subirComentario'])->name('comentarios.subir');

//cuentas
Route::get('/login', [CuentasController::class, 'iniciarVista'])->name('cuentas.login');
Route::post('/login/proceso', [CuentasController::class, 'iniciar'])->name('cuentas.loginProceso');
Route::middleware('auth')->get('/unlogin', [CuentasController::class, 'unlogin'])->name('cuentas.unlogin');
Route::middleware('auth')->get('/perfil/{cuenta}', [CuentasController::class, 'perfil'])->name('cuentas.perfil');
Route::get('/nuevo', [CuentasController::class, 'nuevaVista'])->name('cuentas.nuevaVista');
Route::post('/nuevo/crear', [CuentasController::class, 'nueva'])->name('cuentas.nueva');

//admin
Route::middleware('admin')->get('/admin', [AdminController::class, 'listar'])->name('admin.listar');
Route::middleware('admin')->delete('/admin/borrar/{cuenta}', [AdminController::class, 'borrar'])->name('admin.borrar'); 
Route::middleware('admin')->put('/admin/restaurar/{cuenta}', [AdminController::class, 'restaurar'])->name('admin.restaurar');
Route::middleware('admin')->get('/admin/modificar/{cuenta}', [AdminController::class, 'modificarVista'])->name('admin.modificarVista');
Route::middleware('admin')->put('/admin/modificar/proceso/{cuenta}', [AdminController::class, 'modificar'])->name('admin.modificar');
Route::middleware('admin')->get('/admin/crear', [AdminController::class, 'nuevaVista'])->name('admin.nuevaVista');
Route::middleware('admin')->post('/admin/crear/proceso', [AdminController::class, 'nueva'])->name('admin.crear');
Route::middleware('admin')->delete('/admin/publicacion/borrar/{publicacion}', [AdminController::class, 'borrarPublicacion'])->name('admin.borrarPublicacion');

//artistas
Route::middleware('artist')->get('/artista/crear', [ArtistasController::class, 'crearVista'])->name('artistas.crearVista');
Route::middleware('artist')->post('/artista/crear/proceso', [ArtistasController::class, 'crear'])->name('artistas.crear');
