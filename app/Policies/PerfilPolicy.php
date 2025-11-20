<?php

namespace App\Policies;

use App\Models\Usuario;

class PerfilPolicy
{

    /**
     * Determine whether the user can update the model.
     */
    public function update(Usuario $usuarioAutenticado, Usuario $usuarioParametro): bool
    {
        return $usuarioAutenticado->id === $usuarioParametro->id;
    }

}
