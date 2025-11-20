<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use App\Models\Usuario;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\fileExists;


class PublicacionController extends Controller
{
    public function index(Usuario $usuario): View
    {

        return view('usuarios.ver-perfil', [
            'usuario' => $usuario,
        ]);
    }

    public function create(): View
    {
        return view('publicaciones.crear');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);


        Publicacion::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'usuario_id' => Auth::user()->getAuthIdentifier(),
            'imagen' => $request->imagen
        ]);

        return redirect()->route('publicaciones.index', Auth::user()->nombre_usuario);
    }

    public function show(Usuario $usuario, Publicacion $publicacion): View
    {
        return view('publicaciones.mostrar', ["publicacion" => $publicacion, "usuario" => $usuario]);
    }

    public function destroy(Request $request, Publicacion $publicacion): RedirectResponse
    {
        if ($request->user()->cannot('delete', $publicacion)) {
            abort(403);
        }
        $publicacion->delete();

        $imagen_path = public_path('uploads/' . $publicacion->imagen);
        if (fileExists($imagen_path)) {
            unlink(public_path('uploads/' . $publicacion->imagen));
        }

        return redirect()->route('publicaciones.index', Auth::user()->nombre_usuario);
    }
}
