<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductosEcommerces;
class ordenEcommerce extends Model
{
    use HasFactory;
    protected $fillable=[
        "json_productos",
        "client_id",
        "total",
        "estado",
        "tipo_pago",
        "img"
    ];
    protected $casts=[
        "json_productos"=>"array"
    ];
    protected $appends=[
        "productos"
    ];
    public function cliente(){
        return $this->belongsTo(User::class,"client_id");
    }
    public function setJsonProductosAttribute($value){
        $this->attributes["json_productos"]=json_encode($value);
    }
    public function getJsonProductosAttribute($value){
        return json_decode($value);
    }
    public function getProductosAttribute(){
        $productos=[];
        foreach($this->json_productos as $producto){
            $productos[]=ProductosEcommerces::find($producto->id);
        }
        return $productos;
    }
}
