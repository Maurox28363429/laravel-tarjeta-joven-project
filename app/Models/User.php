<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
//Añadimos la clase JWTSubject
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "name",
        "email",
        "password",
        "role_id",
        "active",
        "phone",
        "last_name",
        "sex",
        "address",
        "code",
        "img_url",
        "dni",
        "fecha_nacimiento",
        "beneficiario_poliza_name",
        "beneficiario_poliza_cedula",
        "vendedor",
        "provincia",
        "dni_text",
        "parentesco",
        "seguro_active",
        "consecutivo"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'recovery_cod'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function membresia()
    {
        return $this->belongsTo(membresia::class, 'id','user_id');
    }
    public function getImgUrlAttribute($value){
        if($value==null || $value==''){
            if($this->attributes['sex']==1){
                return env('APP_URL')."assets/img/hombre.png";
            }else{
                return env('APP_URL')."assets/img/mujer.png";
            }
        }else{
            return $value;
        }
    }
    public function setProvinciaAttribute($value){
        $this->attributes['provincia'] = json_encode($value);
    }
    public function getProvinciaAttribute($value){
        return json_decode($value);
    }
}
