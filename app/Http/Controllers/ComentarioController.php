<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Publicacion;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request, Usuario $usuario, Publicacion $publicacion)
    {

        $request->validate([
            'comentario' => 'required|max:255',
        ]);

        Comentario::create([
            'usuario_id' => auth()->user()->id,
            'publicacion_id' => $publicacion->id,
            'comentario' => $request->comentario
        ]);


        return back()->with(['usuario' => $usuario, 'publicacion' => $publicacion]);
    }
}
