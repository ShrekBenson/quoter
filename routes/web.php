<?php

use App\Livewire\Clients\AddClient;
use App\Livewire\Clients\Clients;
use App\Livewire\Clients\EditClient;
use App\Livewire\Purchases\CreatePurchase;
use App\Livewire\Purchases\EditPurchase;
use App\Livewire\Purchases\Purchases;
use App\Models\Cliente;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')
        ->name('dashboard');

    Route::get('clients', Clients::class)
        ->name('clients');

    Route::get('clients/new-client', AddClient::class)
        ->name('clients.create');

    Route::get('clients/edit-client/{cliente}', EditClient::class)
        ->name('clients.edit');

    Route::get('purchases', Purchases::class)
        ->name('purchases');

    Route::get('purchases/new-purchase', CreatePurchase::class)
        ->name('purchases.create');

    Route::get('purchases/edit-purchase/{compra}', EditPurchase::class)
        ->name('purchases.edit');
    
    Route::view('profile', 'profile')
        ->name('profile');

    Route::get('videos', function() {
        return view('video', [
            'clientes'=>Cliente::all()
        ]);
    });
});

require __DIR__.'/auth.php';