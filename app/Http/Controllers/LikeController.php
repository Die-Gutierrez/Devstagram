<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Publicacion;

class LikeController extends Controller
{
    public function store(Publicacion $publicacion)
    {
        if ($publicacion->revisarLike(auth()->user())) {
            return $this->destroy($publicacion);
        } else {
            Like::create([
                'usuario_id' => auth()->user()->getAuthIdentifier(),
                'publicacion_id' => $publicacion->id,
            ]);
        }

        return back();
    }

    public function destroy(Publicacion $publicacion)
    {
        $like = $publicacion->likes()->where('usuario_id', auth()->user()->getAuthIdentifier());
        $like->delete();
        return back();
    }
}
