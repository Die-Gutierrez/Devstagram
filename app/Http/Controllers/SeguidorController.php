<?php

namespace App\Http\Controllers;

use App\Models\Seguidor;
use App\Models\Usuario;
use Illuminate\Http\Request;

class SeguidorController extends Controller
{
    public function store(Usuario $usuario, Request $request)
    {
        $usuario->seguidores()->attach($request->user()->id);

        return back();
    }

    public function destroy(Usuario $usuario, Request $request)
    {
        $usuario->seguidores()->detach($request->user()->id);

        return back();
    }
}
