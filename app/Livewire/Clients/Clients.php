<?php

namespace App\Livewire\Clients;

use App\Models\Cliente;
use Livewire\Component;

class Clients extends Component
{
    public $clientes;

    public function mount() {
        $this->clientes = Cliente::all();
    }

    public function render()
    {
        return view('livewire.clients.clients');
    }
}
