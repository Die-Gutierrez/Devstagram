<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_id', 'publicacion_id', 'comentario'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class);
    }
}
