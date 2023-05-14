<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ofertas_comercio extends Model
{
    use HasFactory;
    protected $fillable=[
        "img_array_url",
        "price_total",
        "descuento",
        "description",
        "nombre",
        "fecha_tope_descuento",
        "active",
        "comercio_id",
        "stock",
        "link_map",
        "dir",
        "prioridad"
    ];
    public function setImgArrayUrlAttribute($value){
        $this->attributes['img_array_url'] = json_encode($value);
    }
    public function getImgArrayUrlAttribute($value){
        return json_decode($value);
    }
    public function setLinkMapAttribute($value){
        $this->attributes['link_map'] = json_encode($value);
    }
    public function getLinkMapAttribute($value){
        return json_decode($value);
    }
    public function comercio()
    {
        return $this->belongsTo(User::class,'comercio_id');
    }
}
