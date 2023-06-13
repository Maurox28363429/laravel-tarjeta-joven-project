<?php

namespace App\Imports;

use App\Models\{
    User,
    membresia,
    payment_menbresia
};
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class UserPaymentMembresiaAllImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //try{
            $user=User::create([
                "name"=>$row['nombre'],
                "last_name"=>$row['apellido'],
                "email"=>$row['correo'],
                "active"=>1,
                "phone"=>$row['telefono'],
                "sex"=>$row['sexo'],
                "address"=>$row['direccion'],
                "dni_text"=>$row['cedula'] ?? null,
                "vendedor"=>$row['promotor'] ?? 'Importacion',
                "password"=>bcrypt($row["password"] ?? "12345"),
                "role_id"=>3,
                "beneficiario_poliza_name"=>$row['nombre_beneficario'],
                "beneficiario_poliza_cedula"=>$row['cedula_beneficario']
            ]);
       // }catch(\Exception $e){
       //     return User::where('email',$row['correo'])->first();
       // }
        $nowTimeDate = Carbon::now()->addYear();
        $membresia= membresia::create([
            'user_id'=>$user->id,
            'fecha_cobro'=>$nowTimeDate,
            'type'=>"Comprada",
            'membresia_id'=>6
        ]);
        $payment_membresia=payment_menbresia::create([
            "payment"=>9.99,
            "user_id"=>$user->id,
            "referencia"=>"Importacion excel",
            "verificado"=>1,
            "membresia_id"=>$membresia->id,
        ]);
        return $user;
    }
}
