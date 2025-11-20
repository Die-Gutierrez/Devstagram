<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SeguidorController;
use Illuminate\Support\Facades\Route;


Route::get('/', [InicioController::class, 'index'])->name('index');

Route::get('/crear-cuenta', [RegistroController::class, 'index'])->name('registro.index');
Route::post('/crear-cuenta', [RegistroController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/mi-muro/{usuario:nombre_usuario}', [PublicacionController::class, 'index'])->name('publicaciones.index')
        ->withoutMiddleware('auth');
    Route::get('/{usuario:nombre_usuario}/publicaciones/{publicacion}', [PublicacionController::class, 'show'])->name('publicaciones.show')
        ->withoutMiddleware('auth');
    Route::get('/publicaciones/crear', [PublicacionController::class, 'create'])->name('publicaciones.create')->excludedMiddleware();
    Route::post('/publicaciones', [PublicacionController::class, 'store'])->name('publicaciones.store');
    Route::delete('/publicaciones/{publicacion}', [PublicacionController::class, 'destroy'])->name('publicaciones.destroy');


    Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');
    Route::delete('/imagenes/{imagen}', [ImagenController::class, 'destroy'])->name('imagenes.destroy');

    Route::post('/{usuario:nombre_usuario}/publicaciones/{publicacion}', [ComentarioController::class, 'store'])->name('comentarios.store');

    Route::post('/publicaciones/{publicacion}/likes', [LikeController::class, 'store'])->name('publicaciones.likes.store');
    Route::delete('/publicaciones/{publicacion}/likes', [LikeController::class, 'destroy'])->name('publicaciones.likes.destroy');

    Route::get('/{usuario:nombre_usuario}/editar-usuarios', [PerfilController::class, 'index'])->name('perfiles.index');
    Route::post('/{usuario:nombre_usuario}/editar-usuarios', [PerfilController::class, 'store'])->name('perfiles.store');
    Route::patch('/{usuario:nombre_usuario}/editar-usuarios', [PerfilController::class, 'update'])->name('perfiles.update');

    Route::post('/{usuario:nombre_usuario}/seguir', [SeguidorController::class, 'store'])->name('usuarios.seguidores.store');
    Route::delete('/{usuario:nombre_usuario}/dejar-de-seguir', [SeguidorController::class, 'destroy'])->name('usuarios.seguidores.destroy');

});

