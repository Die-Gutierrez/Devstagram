<?php

namespace App\Livewire;

use App\Models\Comentario;
use App\Models\Respuesta;
use Livewire\Component;

class ComentarPublicacion extends Component
{
    public $publicacion;
    public $usuario;
    public $idComentarioSeleccionado;
    public $comentarioInput;
    public $comentarios;
    public $verRespuestasClick;
    public $respuestaInput;

    protected $listeners = ['respuestaEliminada' => 'actualizarRespuestas'];

    public function mount($publicacion)
    {
        $this->comentarios = $this->publicacion->comentarios;
        $verRespuestasClick = false;
    }

    public function verRespuestas()
    {
        $this->verRespuestasClick = !$this->verRespuestasClick;
    }

    public function responder($idComentarioSeleccionado)
    {
        $this->idComentarioSeleccionado = $idComentarioSeleccionado;
    }

    public function actualizarRespuestas($idRespuesta, $idComentario)
    {
        $this->comentarios->each(function ($comentario) use ($idComentario, $idRespuesta) {
            if ($comentario->id == $idComentario) {
                $comentario->respuestas = $comentario->respuestas->filter(function ($respuesta) use ($idRespuesta) {
                    return $respuesta->id != $idRespuesta;
                });
            }
        });
    }

    public function publicarRespuesta($idComentario)
    {
        $this->validate([
            'respuestaInput' => 'required|min:3|max:255',
        ]);

        Respuesta::create([
            'respuesta' => $this->respuestaInput,
            'comentario_id' => $idComentario,
            'usuario_id' => auth()->user()->id
        ]);

        $this->respuestaInput = '';
        $this->dispatch('respuestaPublicada', $idComentario);
    }

    public function comentar()
    {
        $this->validate([
            'comentarioInput' => 'required|max:255',
        ]);

        $nuevoComentario = Comentario::create([
            'usuario_id' => auth()->user()->id,
            'publicacion_id' => $this->publicacion->id,
            'comentario' => $this->comentarioInput
        ]);

        $this->comentarios->add($nuevoComentario);
        $this->comentarioInput = '';
    }

    public function eliminarComentario($idComentario)
    {
        Comentario::where('id', $idComentario)->delete();
        $this->comentarios = $this->comentarios->filter(function ($comentario) use ($idComentario) {
            return $comentario->id != $idComentario;
        });
    }

    public function render()
    {
        return view('livewire.comentar-publicacion');
    }
}
