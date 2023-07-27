<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductosEcommerces extends Model
{
    use HasFactory;
    protected $fillable=[
        "nombre",
        "descripcion",
        "img",
        "precio",
        "whatsap",
        "stock"
    ];
}
