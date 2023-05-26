<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formulario extends Model
{
    use HasFactory;
    protected $fillable=[
        "vendedor",
        "name",
        "last_name",
        "dni",
        "email",
        "type_contact",
        "age_range",
        "place_you_frequent"
    ];
}
