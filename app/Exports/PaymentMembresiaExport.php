<?php

namespace App\Exports;

use App\Models\payment_menbresia;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;
class PaymentMembresiaExport implements FromCollection,WithHeadings
{
    protected $parametros;

    public function __construct($parametros)
    {
        $this->parametros = $parametros;
    }
    public function collection()
    {
        return payment_menbresia::query()
            ->with(['user'])
            ->get()
            ->map(function($form){

            $date = Carbon::createFromFormat('Y-m-d H:i:s',$form->created_at)->format('d/m/Y H:i:s');

            return [
                "#"=>$form->id ?? "No disponible",
                "Nombre"=>$form->user->name." ".$form->user->last_name ?? "No disponible",
                "Email"=>$form->user->email ?? "No disponible",
                "Telefono"=>$form->user->phone ?? "No disponible",
                "Total Pagado"=>$form->payment ?? "No disponible",
                "verificado"=>($form->verificado==1)? "Verificado":"Pendiente",
                "Emicion"=>$date
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
            "Nombre",
            "Email",
            "Telefono",
            "Total Pagado",
            "Verificado",
            "Emicion" 
        ];
    }
}
