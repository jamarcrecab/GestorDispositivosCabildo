<?php

namespace App\Exports;

use App\Models\MaquinaFichar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MaquinasFicharExport implements FromCollection,WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {

        $maquinasfichar = MaquinaFichar::join('dispositivos','dispositivos.id','=','maquina_fichars.id_dispositivo')
        ->select(
            'dispositivos.id','dispositivos.nombre_dispositivo','dispositivos.numero_serie','dispositivos.tipo_dispositivo','dispositivos.conexion','dispositivos.zona_trabajo',
            'maquina_fichars.ip_principal','maquina_fichars.observaciones'
        )->get();

        return $maquinasfichar;

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
            'IP PRINCIPAL',
            'OBSERVACIONES'
        ];

    }


}