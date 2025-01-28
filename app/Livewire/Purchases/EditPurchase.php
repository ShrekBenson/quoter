<?php

namespace App\Livewire\Purchases;

use App\Models\Compra;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditPurchase extends Component
{
    public Compra $compra;

    #[Validate('required', message:'Ingresa el nombre del producto')]
    public $producto;

    #[Validate('required', message:'Ingresa el precio del producto')]
    public $precio = 0;

    #[Validate('required', message:'Ingresa la cantidad de compra')]
    public $cantidad;

    public $total;

    public function mount(Compra $compra) {
        $this->producto = $compra->producto;
        $this->precio = $compra->precio;
        $this->cantidad = $compra->cantidad;
        $this->total = $compra->total;
    }

    public function updatedCantidad() {
        $this->total = $this->cantidad * $this->precio;
    }

    public function udpatePurchase() {
        $this->compra->producto = $this->producto;        
        $this->compra->precio = $this->precio;
        $this->compra->cantidad = $this->cantidad;
        $this->compra->total = $this->total;

        $this->compra->save();
        session()->flash('success', 'Compra actualizada exitosamente.');

        $this->redirectRoute('purchases.edit', [$this->compra], navigate:true);
    }

    public function render()
    {
        return view('livewire.purchases.edit-purchase');
    }
}
