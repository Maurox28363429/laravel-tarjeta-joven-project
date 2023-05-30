<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;
class UsersClientExport implements FromCollection,WithHeadings
{

    protected $parametros;

    public function __construct($parametros)
    {
        $this->parametros = $parametros;
    }
    public function collection()
    {
        $param=$this->parametros;

        if(isset($param['membresia']) && $param['membresia']==true){
            return User::query()
                ->with(['membresia'])
                ->where('role_id',3)
                ->whereHas('membresia',function($q){
                    $q->where('type',"Comprada")->whereDate('fecha_cobro','>',Carbon::now());
                })
                ->get()
                ->map(function($form){
                $date = Carbon::createFromFormat('Y-m-d H:i:s',$form->created_at)->format('d/m/Y H:i:s');
                $fecha_nacimiento= new Carbon($form->fecha_nacimiento);
                $fecha_nacimiento = $fecha_nacimiento->format('d/m/Y');
                return [
                    "#"=>$form->id ?? "No disponible",
                    "Nombre"=>$form->name." ".$form->last_name ?? "No disponible",
                    "DNI_text"=>$form->dni_text ?? "No disponible",
                    "Email"=>$form->email ?? "No disponible",
                    "Telefono"=>$form->phone ?? "No disponible",
                    "membresia"=>$form->membresia->type ?? "No disponible",
                    "Vencimiento_membresia"=>$form->membresia->fecha_cobro,
                    "sexo"=>$form->sex ?? "No disponible",
                    "direccion"=>$form->address ?? "No disponible",
                    "dni"=>$form->dni ?? "No disponible",
                    "fecha_nacimiento"=>$fecha_nacimiento ?? "No disponible",
                    "beneficiario_poliza_name"=>$form->beneficiario_poliza_name ?? "No disponible",
                    "beneficiario_poliza_cedula"=>$form->beneficiario_poliza_cedula ?? "No disponible",
                    "EMITIDO"=>$date ?? "No disponible",
                ];
            });
        }else{
            return User::query()
                ->with(['membresia'])
                ->where('role_id',3)
                ->get()
                ->map(function($form){

                $date = Carbon::createFromFormat('Y-m-d H:i:s',$form->created_at)->format('d/m/Y H:i:s');
                $fecha_nacimiento= new Carbon($form->fecha_nacimiento);
                $fecha_nacimiento = $fecha_nacimiento->format('d/m/Y');
                return [
                    "#"=>$form->id ?? "No disponible",
                    "Nombre"=>$form->name." ".$form->last_name ?? "No disponible",
                    "DNI Text"=>$form->dni_text ?? "No disponible",
                    "Email"=>$form->email ?? "No disponible",
                    "Telefono"=>$form->phone ?? "No disponible",
                    "membresia"=>$form->membresia->type ?? "No disponible",
                    "sexo"=>$form->sex ?? "No disponible",
                    "direccion"=>$form->address ?? "No disponible",
                    "dni"=>$form->dni ?? "No disponible",
                    "fecha_nacimiento"=>$fecha_nacimiento ?? "No disponible",
                    "beneficiario_poliza_name"=>$form->beneficiario_poliza_name ?? "No disponible",
                    "beneficiario_poliza_cedula"=>$form->beneficiario_poliza_cedula ?? "No disponible",
                    "EMITIDO"=>$date ?? "No disponible",
                ];
            });
        }
    }
        public function title(): string
    {
        return 'Reporte';
    }
    public function headings():array
    {
        $param=$this->parametros;
        if(isset($param['membresia']) && $param['membresia']==true){
            return [
                "#",
                "Nombre",
                "DNI text",
                "Email",
                "Telefono",
                "Membresia",
                "Vencimiento_membresia",
                "Sexo",
                "Direccion",
                "DNI",
                "Fecha de nacimiento",
                "beneficiario nombre",
                "beneficiario DNI",
                "Emicion" 
            ];
        }else{
            return [
                "#",
                "Nombre",
                "DNI text",
                "Email",
                "Telefono",
                "Membresia",
                "Sexo",
                "Direccion",
                "DNI",
                "Fecha de nacimiento",
                "beneficiario nombre",
                "beneficiario DNI",
                "Emicion" 
            ];
        }

    }
}
