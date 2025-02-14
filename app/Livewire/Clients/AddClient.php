<?php

namespace App\Livewire\Clients;

use App\Livewire\Forms\ClienteForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddClient extends Component
{
    use WithFileUploads;

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
