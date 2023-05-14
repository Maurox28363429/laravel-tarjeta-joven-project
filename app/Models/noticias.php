<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class noticias extends Model
{
    use HasFactory;
    protected $fillable=[
        "titulo",
        "descripcion",
        "categoria",
        "img_url",
        "links",
        "prioridad"
    ];
    public function getCreatedAtAttribute(){
        $date=explode(" ", $this->attributes['created_at']);
        $fecha=$date[0];
        $time=$date[1];
        $fecha=explode("-",$fecha);
        return $fecha=$fecha["2"]."/".$fecha["1"]."/".$fecha["0"];
    }
    public function setLinksAttribute($value){
        $this->attributes['links'] = json_encode($value);
    }
    public function getLinksAttribute($value){
        if($value==null){
            $datos=[
                "facebook" => null,
                "instagram" => null,
                "web" => null,
                "youtube" => null
            ];
        }else{
            $datos = json_decode($value);
        }
        
        return $datos;
    }
}


