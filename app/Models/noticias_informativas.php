<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class noticias_informativas extends Model
{
    use HasFactory;
    protected $fillable=[
        "titulo",
        "descripcion",
        "img_url",
        "prioridad",
        "link_youtube",
        "link_facebook",
        "link_instragram",
        "link_web",
        "link_otros"
    ];
    public function getCreatedAtAttribute(){
        $date=explode(" ", $this->attributes['created_at']);
        $fecha=$date[0];
        $time=$date[1];
        $fecha=explode("-",$fecha);
        return $fecha=$fecha["2"]."/".$fecha["1"]."/".$fecha["0"];
    }
    public function getImgUrlAttribute($value){
        if($value==null || $value==''){
            return "https://placehold.co/600x400/png";
        }else{
            return $value;
        }
    }
}
