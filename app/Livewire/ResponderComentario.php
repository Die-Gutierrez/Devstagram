<?php

namespace App\Livewire;

use App\Models\Comentario;
use App\Models\Respuesta;
use Livewire\Component;

class ResponderComentario extends Component
{
    public $respuestas;
    public $idComentario;

    protected $listeners = ['respuestaPublicada' => 'actualizarRespuestas'];

    public function mount()
    {
        $this->respuestas = Comentario::where('id', $this->idComentario)->first()->respuestas;
    }

    public function actualizarRespuestas($idComentario)
    {
        if ($this->idComentario == $idComentario) {
            $this->respuestas = Comentario::find($idComentario)->respuestas;
        }
    }

    public function eliminarRespuesta($idRespuesta)
    {
        $respuesta = Respuesta::find($idRespuesta);
        if ($respuesta) {
            $respuesta->delete();
            $this->respuestas = $this->respuestas->filter(function ($respuesta) use ($idRespuesta) {
                return $respuesta->id != $idRespuesta;
            });
        }
    }

    public function render()
    {
        return view('livewire.responder-comentario');
    }


}
