<?php

namespace App\Livewire\Clients;

use App\Livewire\Forms\ClienteForm;
use Livewire\Component;

class AddClient extends Component
{
    public ClienteForm $clienteForm;

    public function saveClient() {        
        $this->clienteForm->save();

        session()->flash('success','El cliente ha sido agregado exitosamente');

        $this->redirectRoute('clients.create', navigate:true);
    }

    public function render()
    {
        return view('livewire.clients.add-client');
    }
}
