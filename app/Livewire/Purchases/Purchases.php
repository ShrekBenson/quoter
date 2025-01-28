<?php

namespace App\Livewire\Purchases;

use App\Models\Compra;
use Livewire\Component;

class Purchases extends Component
{
    public $compras;

    public function mount() {
        $this->compras = Compra::all();
    }

    public function render()
    {
        return view('livewire.purchases.purchases');
    }
}
