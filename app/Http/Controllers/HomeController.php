<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;

class HomeController extends Controller
{


    public function index()
    {
        $ids = auth()->user()->seguimientos->pluck('id')->toArray();

        $publicaciones = Publicacion::whereIn('usuario_id', $ids)->latest()->get();
        return view('usuarios.home', ['publicaciones' => $publicaciones]);
    }
}
