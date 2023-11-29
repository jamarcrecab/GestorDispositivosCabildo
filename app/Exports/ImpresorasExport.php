<?php

namespace App\Exports;

use App\Models\Impresora;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ImpresorasExport implements FromCollection,WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {

        return Impresora::join('dispositivos','dispositivos.id','=','impresoras.id_dispositivo')
        ->select(
            'dispositivos.id','dispositivos.nombre_dispositivo','dispositivos.numero_serie','dispositivos.tipo_dispositivo','dispositivos.conexion','dispositivos.zona_trabajo',
            'impresoras.marca','impresoras.modelo','impresoras.ip_principal','impresoras.ip_secundaria','impresoras.cabildo','impresoras.observaciones'
        )->get();

    }

    public function headings(): array
    {

        return [

            'ID',
            'NOMBRE DISPOSITIVO',
            'NUMERO SERIE',
            'TIPO DISPOSITIVO',
            'CONEXION',
            'ZONA TRABAJO',
            'MARCA',
            'MODELO',
            'IP PRINCIPAL',
            'IP SECUNDARIA',
            'PERTENECE AL CABILDO',
            'OBSERVACIONES'
        ];

    }


}