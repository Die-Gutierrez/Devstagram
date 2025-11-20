<?php

namespace App\auth;

use App\Models\Usuario;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use SensitiveParameter;

class CustomUserProvider extends EloquentUserProvider
{

    public function retrieveByCredentials(#[SensitiveParameter] array $credentials)
    {
        $qry = Usuario::where('correo', '=', $credentials['correo']);

        if ($qry->count() > 0) {
            $user = $qry->select()->first();
            return $user;
        }
        return null;
    }

    public function validateCredentials(Authenticatable $user, array $credentials): bool
    {
        if (is_null($plain = $credentials['clave'])) {
            return false;
        }
        return $this->hasher->check($plain, $user->getAuthPassword());
    }
}
