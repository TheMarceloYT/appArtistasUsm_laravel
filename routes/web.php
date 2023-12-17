<?php

use App\Http\Controllers\AdminController;
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
Route::get('/imagenes/filtradas', [ImagenesController::class, 'filtrar'])->name('imagenesFiltro.index');

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
