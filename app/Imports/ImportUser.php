<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportUser implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if(!isset($row['id'])){
            return [];
        }
        $row['dni']=str_replace('-', '', $row['dni']);
        $user=User::query()
            ->where('email',$row['mail'])
            ->update([
                'dni'=>$row['dni'],
                'fecha_nacimiento'=>$row['fecha_nacimiento'],
                'beneficiario_poliza_name'=>$row['nombre_beneficiario'],
                'beneficiario_poliza_cedula'=>$row['dni_beneficiario']
            ]);
        return $user;
    }
}
