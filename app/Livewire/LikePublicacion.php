<?php

namespace App\Livewire;

use App\Models\Like;
use Livewire\Component;

class LikePublicacion extends Component
{
    public $publicacion;
    public $isLiked;
    public $likesNumber;

    public function mount($publicacion)
    {
        $this->isLiked = $publicacion->revisarLike(auth()->user());
        $this->likesNumber = $publicacion->likes->count();
    }

    public function like()
    {
        if ($this->publicacion->revisarLike(auth()->user())) {
            $like = $this->publicacion->likes()->where('usuario_id', auth()->user()->getAuthIdentifier());
            $like->delete();
            $this->isLiked = false;
            $this->likesNumber--;
        } else {
            Like::create([
                'usuario_id' => auth()->user()->getAuthIdentifier(),
                'publicacion_id' => $this->publicacion->id,
            ]);
            $this->isLiked = true;
            $this->likesNumber++;
        }
    }

    public function render()
    {
        return view('livewire.like-publicacion');
    }
}
