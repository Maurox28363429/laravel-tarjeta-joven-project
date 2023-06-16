<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sos extends Model
{
    use HasFactory;
    protected $fillable=[
        'img',
        'phone',
        'name',
        'descripcion'
    ];
    
    public function getImgAttribute($value){
        if($value==null || $value==''){
            return "https://tarjetajovenapi.phoenixtechsa.com/salvavidas.jpg";
        }else{
            return $value;
        }
    }
}
