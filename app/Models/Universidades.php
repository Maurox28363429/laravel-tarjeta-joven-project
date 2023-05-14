<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universidades extends Model
{
    use HasFactory;
    protected $fillable=[
        "img_array_url",
        "description",
        "nombre",
        "active",
        "universidad_id",
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
    public function universidad()
    {
        return $this->belongsTo(User::class,'universidad_id');
    }
}
