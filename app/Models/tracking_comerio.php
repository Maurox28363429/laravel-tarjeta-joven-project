<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tracking_comerio extends Model
{
    use HasFactory;
    protected $fillable=[
        "user_id",
        "comercio_id"    
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }//User
    public function comercio()
    {
        return $this->belongsTo(User::class, 'comercio_id');
    }//User
}
