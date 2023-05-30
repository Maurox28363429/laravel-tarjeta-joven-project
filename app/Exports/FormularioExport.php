<?php

namespace App\Exports;

use App\Models\formulario;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;
class FormularioExport implements FromCollection,WithHeadings
{
    protected $parametros;

    public function __construct($parametros)
    {
        $this->parametros = $parametros;
    }
    public function collection()
    {
        $param=$this->parametros;

        return formulario::query()
            ->get()
            ->map(function($form){

            $date = Carbon::createFromFormat('Y-m-d H:i:s',$form->created_at)->format('d/m/Y H:i:s');
            return [
                "#"=>$form->id ?? "No disponible",
                "vendedor"=>$form->vendedor ?? "No disponible",
                "name"=>$form->name ?? "No disponible",
                "last_name"=>$form->last_name ?? "No disponible",
                "dni"=>$form->dni ?? "No disponible",
                "email"=>$form->email ?? "No disponible",
                "type_contact"=>$form->type_contact ?? "No disponible",
                "age_range"=>$form->age_range ?? "No disponible",
                "place_you_frequent"=>$form->place_you_frequen ?? "No disponible",
                "Emitido"=>$date
            ];
        });
    }
    public function title(): string
    {
        return 'Reporte';
    }
    public function headings():array
    {
        return [
            "#",
            "Vendedor",
            "Nombre",
            "Apellido",
            "Cedula",
            "Correo",
            "Tipo de contacto",
            "Rango de fecha",
            "Lugares que frecuenta",
            "Emicion" 
        ];
    }
}
