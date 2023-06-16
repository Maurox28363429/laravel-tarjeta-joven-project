<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class concurso extends Model
{
    use HasFactory;
    protected $fillable=[
        "ganador_id",
        "init_date",
        "end_date",
        "active",
        "titulo",
        "descripcion",
        "img",
        "steps"
    ];
    public function getImgAttribute($value){
        if($value==null || $value==''){
            return "https://placehold.co/600x400/png";
        }else{
            return $value;
        }
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'ganador_id');
    }//User
    
    public function setStepsAttribute($value){
        $this->attributes['steps'] = json_encode($value);
    }
    public function getStepsAttribute($value){
        return json_decode($value);
    }
}
