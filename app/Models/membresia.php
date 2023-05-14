<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\price_membresia;
class membresia extends Model
{
    use HasFactory;
    protected $fillable=[
        "fecha_cobro",
        "user_id",
        "membresia_id",
        "type"
    ];
    protected $appends = ['status','price','days'];

    //accesor
    function getStatusAttribute() {
        //init carbon
        $nowTimeDate = Carbon::now();
        $initDate=new Carbon($this->fecha_cobro);
        $diferencia=$initDate->diffInDays($nowTimeDate);
        $response="activa";
        if($nowTimeDate->greaterThanOrEqualTo($initDate)){
            $diferencia="-".$diferencia;
        }
        if($diferencia<=0){
            $response="vencida";
        }
        return $response;
    }
    function getDaysAttribute() {
        //init carbon
        $nowTimeDate = Carbon::now();
        $initDate=new Carbon($this->fecha_cobro);
        $days=$initDate->diffInDays($nowTimeDate);
        if($nowTimeDate->greaterThanOrEqualTo($initDate)){
            $days="-".$days;
        }
        return $days;
    }
    function getPriceAttribute(){
        return price_membresia::query()->limit(1)->first()->price ?? 0;
    }
}


