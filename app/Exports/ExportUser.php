<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;
class ExportUser implements FromCollection,WithHeadings
{
    public function __construct($parametros)
    {
        $this->parametros = $parametros;
    }
    public function collection()
    {
        $param=$this->parametros;
        if($param['vendedor']){
            $query=User::query();
            if($param['init_date']){
                $query->whereDate('created_at', '>=', $param['init_date']);
            }
            if($param['end_date']){
                $query->whereDate('created_at', '<=', $param['end_date']);
            }
            return $query
                    ->where('vendedor','=',$param['vendedor'])
                    ->where('role_id',3)
                    ->whereHas('membresia',function($q){
                        $q->where('type',"Comprada");
                    })->get()->map(function($form,$index){
                        return [
                            "consecutivo"=>$index+1,
                            "nombre"=>$form->name.' '.$form->last_name,
                            'email'=>$form->email
                        ];
                    });
        }
    }
    public function headings():array
    {
        $param=$this->parametros;
        if($param['vendedor']){
            return [
                'CONSECUTIVO',
                'NOMBRE',
                'EMAIL'
            ];
        }
    }
}
