<?php

namespace App\Policies;

use App\Models\Publicacion;
use App\Models\Usuario;

class PublicacionPolicy
{

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Usuario $usuario, Publicacion $publicacion): bool
    {
        return $usuario->id === $publicacion->usuario_id;
    }


}
