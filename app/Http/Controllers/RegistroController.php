<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;


class RegistroController extends Controller
{
    public function index(): View
    {
        return view('auth.registrar');
    }

    public function store(Request $request): RedirectResponse
    {

        $request->request->add(['nombre_usuario' => Str::slug($request->nombre_usuario)]);

        $request->validate([
            'nombre' => 'required|max:30',
            'nombre_usuario' => 'required|unique:usuarios|min:3|max:30',
            'correo' => 'required|unique:usuarios|email|max:60',
            'clave' => 'required|confirmed|min:6'
        ]);

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'nombre_usuario' => $request->nombre_usuario,
            'correo' => $request->correo,
            'clave' => Hash::make($request->clave),
        ]);
        Auth::login($usuario);

        return redirect()->route('publicaciones.index', $usuario);
    }
}
