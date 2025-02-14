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

    #[Validate('nullable')]
    #[Validate('image', message:'El archivo no es una imagen válida')]
    #[Validate('mimes:jpg,jpeg,png,svg,bmp,webp,gif', message:'Solo se admiten los formatos: jpg,jpeg,png,svg,bmp,webp,gif')]
    #[Validate('max:2048', message:'El archivo debe pesar menos de 2MB')]
    public $miniatura;

    #[Validate('nullable')]
    #[Validate('mimes:mp4,mov,avi,wmv', message:'Solo se admiten los formatos: mp4,mov,avi,wmv')]
    #[Validate('max:10240', message:'El archivo debe pesar menos de 10MB')]
    public $video;

    public function save() {
        $this->validate();

        $imagePath = null;
        $videoPath = null;

        if ($this->miniatura) {
            $imageName = time().'.'.$this->miniatura->extension();
            $imagePath = $this->miniatura->storeAs('/uploads/miniaturas', $imageName);
        }

        if ($this->video) {
            $videoName = time().'.'.$this->video->extension();
            $videoPath = $this->video->storeAs('/uploads/videos', $videoName);
        }

        Cliente::create([
            'nombre'=>$this->nombre,
            'ubicacion'=>$this->ubicacion,
            'email'=>$this->email,
            'telefono'=>$this->telefono,
            'miniatura'=>$imagePath,
            'video'=>$videoPath
        ]);

        $this->reset();
    }
}
