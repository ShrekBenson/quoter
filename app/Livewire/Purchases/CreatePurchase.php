<?php

namespace App\Livewire\Purchases;

use App\Models\Compra;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreatePurchase extends Component
{
    #[Validate('required', message:'Ingresa el nombre del producto')]
    public $producto;
    #[Validate('required', message:'Ingresa el precio del producto')]
    public $precio = 0;
    #[Validate('required', message:'Ingresa la cantidad de compra')]
    public $cantidad;
    public $total;

    public function updatedCantidad() {
        $this->total = $this->cantidad * $this->precio;
    }

    public function savePurchase() {
        $this->validate();
        
        Compra::create(
            $this->only('producto', 'precio', 'cantidad', 'total')
        );

        session()->flash('success','La compra ha sido registrada exitosamente');

        $this->redirectRoute('purchases.create', navigate:true);
    }

    public function render()
    {
        return view('livewire.purchases.create-purchase');
    }
}
