<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'correo',
        'clave',
        'nombre_usuario',
        'imagen'
    ];

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword(): string
    {
        return $this->clave;
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'correo_verificado_el' => 'datetime',
            'clave' => 'hashed',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'nombre_usuario';
    }

    public function publicaciones()
    {
        return $this->hasMany(Publicacion::class);
    }

    public function seguidores()
    {
        return $this->belongsToMany(Usuario::class, 'usuarios_seguidores', 'usuario_id', 'seguidor_id');
    }

    public function seguimientos()
    {
        return $this->belongsToMany(Usuario::class, 'usuarios_seguidores', 'seguidor_id', 'usuario_id');
    }

    public function revisarSeguidor(Usuario $usuarioAutenticado)
    {
        return $this->seguidores()->where('seguidor_id', $usuarioAutenticado->id)->exists();
    }
}
