<?php

namespace App\Livewire\Clients;

use App\Models\Cliente;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditClient extends Component
{
    use WithFileUploads;

    public Cliente $cliente;

    #[Validate('required', message:'El nombre es requerido')]
    #[Validate('min:3', message:'El nombre debe ser de al menos 3 caracteres')]
    public $nombre;
    
    #[Validate('required', message:'La ubicación es requerida')]
    #[Validate('min:3', message:'La ubicación debe ser de al menos 3 caracteres')]
    public $ubicacion;

    #[Validate('required', message:'El email es requerido')]
    #[Validate('email', message:'El email no es valido')]
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

    public function mount() {
        $this->nombre = $this->cliente->nombre;
        $this->ubicacion = $this->cliente->ubicacion;
        $this->email = $this->cliente->email;
        $this->telefono = $this->cliente->telefono;        
    }

    public function udpateClient() {
        $this->validate();

        $this->cliente->nombre = $this->nombre;
        $this->cliente->ubicacion = $this->ubicacion;
        $this->cliente->email = $this->email;
        $this->cliente->telefono = $this->telefono;

        $imagePath = null;
        $videoPath = null;

        if ($this->miniatura) {
            $imageName = time().'.'.$this->miniatura->extension();
            $imagePath = $this->miniatura->storeAs('/uploads/miniaturas', $imageName);

            if ($this->cliente->miniatura) {
                Storage::disk('public')->delete($this->cliente->miniatura);
            }

            $this->cliente->miniatura = $imagePath;
        }

        if ($this->video) {
            $videoName = time().'.'.$this->video->extension();
            $videoPath = $this->video->storeAs('/uploads/videos', $videoName);

            if ($this->cliente->video) {                
                Storage::disk('public')->delete($this->cliente->video);
            }

            $this->cliente->video = $videoPath;
        }        

        $this->cliente->save();
        session()->flash('success', 'La información del cliente fue actualizado exitosamente.');

        $this->redirectRoute('clients.edit', [$this->cliente], navigate:true);
    }

    public function render()
    {
        return view('livewire.clients.edit-client');
    }
}
