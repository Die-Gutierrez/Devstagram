<?php

namespace App\Livewire;

use App\Models\Usuario;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class BuscarUsuarios extends Component
{
    public $usuarios = [];
    public $busqueda;
    public $busquedaEstaClickeada;


    public function ocultarListaBusqueda(){
        $this->busquedaEstaClickeada = false;
    }
    public function updated()
    {
        Log::info($this->busqueda);
        if (!$this->busqueda) {
            $this->usuarios = Usuario::all();
        } else {
            $this->usuarios = Usuario::where('nombre_usuario', 'like', '%' . $this->busqueda . '%')->get();
        }
        $this->busquedaEstaClickeada = true;
    }
    public function render()
    {
        return view('livewire.buscar-usuarios');
    }
}
