<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class PerfilController extends Controller
{
    public function index(Request $request, Usuario $usuario)
    {
        if ($request->user()->cannot('update', $usuario)) {
            return redirect()->route('perfiles.index', auth()->user()->nombre_usuario);
        }
        return view('usuarios.editar-perfil')->with('usuario', $usuario);
    }

    public function store(Request $request, Usuario $usuario)
    {
        $request->request->set('nombre_usuario', Str::slug($request->nombre_usuario));
        $request->validate([
            'nombre' => 'required|string|max:30',
            'nombre_usuario' => 'required|string|min:3|max:20|unique:usuarios,nombre_usuario,' . $usuario->id,
            'imagen' => 'nullable|max:256',
        ]);

        if ($request->imagen) {
            $imagen = $request->file('imagen');

            $nombreImagen = Str::uuid() . '.' . $imagen->extension();

            $manager = new ImageManager(new Driver());

            $imagenServidor = $manager->read($imagen);

            $imagenServidor->resize(500, 500);

            $imagenServidor->save('perfiles/' . $nombreImagen);

        }

        $usuario->nombre = $request->nombre;
        $usuario->nombre_usuario = $request->nombre_usuario;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagne ?? null;

        $usuario->save();

        return redirect()->route('publicaciones.index', $usuario);
    }

    public function update(Usuario $usuario)
    {
        if (file_exists(public_path('perfiles/' . $usuario->imagen))) {
            unlink(public_path('perfiles/' . $usuario->imagen));
        }

        $usuario->imagen = null;

        $usuario->save();

        return back();
    }
}
