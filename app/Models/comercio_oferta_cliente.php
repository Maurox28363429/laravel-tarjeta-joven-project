<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ofertas_comercio;
class comercio_oferta_cliente extends Model
{
    use HasFactory;
    protected $fillable=[
        "comercio_id",
        "client_id",
        "total",
        "total_descuento",
        "ofertas"
    ];
    public function setOfertasAttribute($value){
        $this->attributes['ofertas'] = json_encode($value);
    }
    public function getOfertasAttribute($value){
        $data=json_decode($value);
        $models=[];
        foreach ($data as $key=>$value) {
            $product=ofertas_comercio::find($value->id ?? null);
            if($product){
                $product->cantidad=$value->cantidad ?? 0;
                $models[]=[
                    "id"=>$product->id,
                    "img_url"=>$product->img_array_url[0] ?? "https://img.freepik.com/free-psd/isolated-cardboard-box_125540-1169.jpg?w=740&t=st=1678203782~exp=1678204382~hmac=89c9f136d15f19186995900071f9ab72d17e9b036161e3cea3d4d9381035db22",
                    "cantidad"=>$product->cantidad,
                    "price"=>$product->price_total,
                    "descuento"=>$product->descuento,
                    "nombre"=>$product->nombre
                ];
            }
        }
        return $models;
    }
    public function comercio()
    {
        return $this->belongsTo(User::class,'comercio_id');
    }
        public function client()
    {
        return $this->belongsTo(User::class,'client_id');
    }
}
