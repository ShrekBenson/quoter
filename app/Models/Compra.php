<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = [
        'producto',
        'precio',
        'cantidad',
        'total'
    ];
}
