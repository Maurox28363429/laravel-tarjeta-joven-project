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
        $query=User::query();
        if($param['init_date']){
            $query->whereDate('created_at', '>=', $param['init_date']);
        }
        if($param['end_date']){
            $query->whereDate('created_at', '<=', $param['end_date']);
        }
        if(isset($param['vendedor'])){
            $query->where('vendedor','=',$param['vendedor']);
        }
            return $query
                    ->where('role_id',3)
                    ->whereHas('membresia',function($q){
                        $q->where('type',"Comprada");
                    })->get()->map(function($form,$index){
                        $fecha= new Carbon($form->created_at);
                        $fecha = $fecha->format('d/m/Y');
                        return [
                            "consecutivo"=>$index+1,
                            'vendedor'=>$form->vendedor,
                            "nombre"=>$form->name.' '.$form->last_name,
                            'email'=>$form->email,
                            'FECHA'=>$fecha
                        ];
                    });
        
    }
    public function headings():array
    {
        $param=$this->parametros;

            return [
                'CONSECUTIVO',
                'VENDEDOR',
                'NOMBRE',
                'EMAIL',
                'FECHA'
            ];
        
    }
}
