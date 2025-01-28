<?php

namespace App\Livewire\Forms;

use App\Models\Cliente;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ClienteForm extends Form
{
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

    public function save() {
        $this->validate();        

        Cliente::create(
            $this->all()
        );
    }
}
