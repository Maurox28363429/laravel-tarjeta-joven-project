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
        "stock",
        "category_id"
    ];
    public function categoria()
    {
        return $this->belongsTo(productoCategorias::class, 'category_id');
    }
}
