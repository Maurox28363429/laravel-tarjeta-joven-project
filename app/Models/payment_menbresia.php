<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment_menbresia extends Model
{
    use HasFactory;
    protected $fillable=[
        "payment",
        "user_id",
        "referencia",
        "verificado",
        "membresia_id",
        "img_url"
    ];

    public function membresia()
    {
        return $this->belongsTo(membresia::class, 'membresia_id');
    }//membresia
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }//User
}//pay
