<?php

namespace App\Exports;

use App\Models\Tarjeta;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TarjetasExport implements FromCollection,WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {

        $tarjetas = DB::table('tarjetas')->select('nombre','apellidos','correo','dni','icc','telefono','extension','pin','puk','tipo_contrato','servicios_adicionales','fecha_recogida','fecha_alta','estado','puesto','departamento',)->get();
        return $tarjetas;
    }

    public function headings(): array
    {

        return [

            'NOMBRE',
            'APELLIDOS',
            'CORREO',
            'DNI',
            'ICC',
            'TELEFONO',
            'EXTENSION',
            'PIN',
            'PUK',
            'TIPO CONTRATO',
            'SERVICIOS ADICIONALES',
            'FECHA RECOGIDA',
            'FECHA ALTA',
            'ESTADO',
            'PUESTO',
            'DEPARTAMENTO',
        ];

    }


}