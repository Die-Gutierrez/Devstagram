<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListarPost extends Component
{

    public $publicaciones;

    /**
     * Create a new component instance.
     */
    public function __construct($publicaciones)
    {
        $this->publicaciones = $publicaciones;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.listar-post');
    }
}
