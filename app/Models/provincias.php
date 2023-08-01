<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    ofertas_comercio,
    Universidades
};
class provincias extends Model
{
    use HasFactory;
    protected $fillable=[
        'name'
    ];
    protected $appends = ['ofertas','universidades'];
    public function getOfertasAttribute() {
        $dir=$this->attributes['name'];
        $query=ofertas_comercio::query();
        $query->whereJsonContains('link_map', ['ubication' => $dir]);
        //$query->where('link_map','like','%'.$dir.'%');
        return $query->count();
    } 
    function getUniversidadesAttribute() {
        $dir=$this->attributes['name'];
        $query=Universidades::query();
        $query->whereJsonContains('link_map', ['ubication' => $dir]);
        return $query->count();
    }
}
