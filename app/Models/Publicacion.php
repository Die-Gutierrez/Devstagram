<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;

    protected $table = 'publicaciones';

    protected $fillable = ['titulo', 'descripcion', 'imagen', 'usuario_id'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class)->select();
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function revisarLike(Usuario $usuario)
    {
        return $this->likes->contains('usuario_id', $usuario->id);
    }
}
