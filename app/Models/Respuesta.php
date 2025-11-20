<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    protected $fillable = ['respuesta', 'comentario_id', 'usuario_id'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
