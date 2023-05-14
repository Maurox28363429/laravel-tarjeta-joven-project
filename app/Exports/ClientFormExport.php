<?php

namespace App\Exports;

use App\Models\ClientForm;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;
class ClientFormExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $parametros;

    public function __construct($parametros)
    {
        $this->parametros = $parametros;
    }
    public function collection()
    {
        $param=$this->parametros;

        return ClientForm::query()->get()
            ->map(function($form){
            $parser=str_replace('rating-2', 'rating',$form->data);
            $datos=json_decode($parser);
            $date = Carbon::createFromFormat('Y-m-d H:i:s',$form->created_at)->format('d/m/Y H:i:s');
            return [
                "#"=>$form->id ?? "No disponible",
                "EMITIDO"=>$date ?? "No disponible",
                "NOMBRE"=>$datos->Nombre ?? "No disponible",
                "APELLIDO"=>$datos->Apellido ?? "No disponible",
                "EDAD"=>$datos->edad ?? "No disponible",
                "VENDEDOR"=>$datos->dni_vendedor ?? "No disponible",
                "TELEFONO"=>$datos->Telefono ?? "No disponible",
                "CORREO"=>$datos->Correo ?? "No disponible",
                "RECOMENDAR"=>($datos->recomendar)? "Si":"No",
                "CEDULA"=>$datos->Cedula ?? "No disponible",
                "NEWSLETTER"=>$datos->newsletter ?? "No disponible",
                "LUGARES FRECUENTADOS"=>$datos->lugares_frecuentes ?? "No disponible",
                "DESCUENTOS"=>implode(' / ',$datos->descuentos) ?? "No disponible",
                "COMENTARIO"=>$datos->comentario ?? "No disponible",
                "RATING"=>$datos->rating ?? "No disponible",
                "CONCURSO"=>$datos->concurso ?? "No disponible",
                "MEMBRESIA"=>$datos->concurso ?? "No disponible", 
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
            "EMITIDO",
            "NOMBRE",
            "APELLIDO",
            "EDAD",
            "VENDEDOR",
            "TELEFONO",
            "CORREO",
            "RECOMENDAR",
            "CEDULA",
            "NEWSLETTER",
            "LUGARES FRECUENTADOS",
            "DESCUENTOS",
            "COMENTARIO",
            "RATING",
            "CONCURSO",
            "MEMBRESIA"   
        ];
    }
}
