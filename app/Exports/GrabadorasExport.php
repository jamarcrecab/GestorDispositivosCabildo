<?php

namespace App\Exports;

use App\Models\Grabadora;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GrabadorasExport implements FromCollection,WithHeadings
{

     /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {

        $grabadoras = Grabadora::join('dispositivos','dispositivos.id','=','grabadoras.id_dispositivo')
        ->select(
            'dispositivos.id','dispositivos.nombre_dispositivo','dispositivos.numero_serie','dispositivos.tipo_dispositivo','dispositivos.conexion','dispositivos.zona_trabajo',
            'grabadoras.modelo','grabadoras.observaciones')->get();

            return $grabadoras;
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
            'MODELO',
            'OBSERVACIONES'
        ];
    }
}