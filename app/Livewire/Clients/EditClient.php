<?php

namespace App\Livewire\Clients;

use App\Models\Cliente;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditClient extends Component
{
    public Cliente $cliente;

    #[Validate('required', message:'El nombre es requerido')]
    #[Validate('min:3', message:'El nombre debe ser de al menos 3 caracteres')]
    public $nombre;
    
    #[Validate('required', message:'La ubicación es requerida')]
    #[Validate('min:3', message:'La ubicación debe ser de al menos 3 caracteres')]
    public $ubicacion;

    #[Validate('required', message:'El email es requerido')]
    #[Validate('email', message:'El email no es valido')]
    #[Validate('unique:clientes', message:'Ya se encuentra registrado el email ingresado')]
    public $email;

    public $telefono;

    public function mount() {
        $this->nombre = $this->cliente->nombre;
        $this->ubicacion = $this->cliente->ubicacion;
        $this->email = $this->cliente->email;
        $this->telefono = $this->cliente->telefono;
    }

    public function udpateClient() {
        $this->cliente->nombre = $this->nombre;
        $this->cliente->ubicacion = $this->ubicacion;
        $this->cliente->email = $this->email;
        $this->cliente->telefono = $this->telefono;

        $this->cliente->save();
        session()->flash('success', 'La información del cliente fue actualizado exitosamente.');

        $this->redirectRoute('clients.edit', [$this->cliente], navigate:true);
    }

    public function render()
    {
        return view('livewire.clients.edit-client');
    }
}
