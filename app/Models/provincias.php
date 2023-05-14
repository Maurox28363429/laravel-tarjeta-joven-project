<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    ofertas_comercio
};
class provincias extends Model
{
    use HasFactory;
    protected $fillable=[
        'name'
    ];
    protected $appends = ['ofertas'];
    public function getOfertasAttribute() {
        $dir=$this->attributes['name'];
        $query=ofertas_comercio::query();
        $query->whereJsonContains('link_map', ['ubication' => $dir]);
        return $query->count();
    }
}
