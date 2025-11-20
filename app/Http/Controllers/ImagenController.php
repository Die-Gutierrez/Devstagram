<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use function PHPUnit\Framework\fileExists;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        $imagen = $request->file('file');

        $nombreImagen = Str::uuid() . '.' . $imagen->extension();

        $manager = new ImageManager(new Driver());

        $imagenServidor = $manager->read($imagen);

        $imagenServidor->resize(600, 600);


        $imagenServidor->save('uploads/' . $nombreImagen);

        return response()->json(['imagen' => $nombreImagen]);
    }

    public function destroy(string $filename)
    {
        if (fileExists(public_path('uploads/' . $filename))) {
            unlink(public_path('uploads/' . $filename));
            return response()->json(['mensaje' => 'Imagen eliminada'])->status(200);
        }
        return response()->json(['mensaje' => 'Error al eliminar la imagen'], 500);
    }
}
