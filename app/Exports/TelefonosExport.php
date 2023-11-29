<?php

namespace App\Exports;

use App\Models\Telefono;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TelefonosExport implements FromCollection,WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {

        $telefonos = Telefono::join('dispositivos','dispositivos.id','=','telefonos.id_dispositivo')
        ->select(
            'dispositivos.id','dispositivos.nombre_dispositivo','dispositivos.numero_serie','dispositivos.tipo_dispositivo','dispositivos.conexion','dispositivos.zona_trabajo',
            'telefonos.departamento','telefonos.marca','telefonos.modelo','telefonos.usuario_principal','numero_telefono','telefonos.correo','telefonos.puesto','telefonos.observaciones'
        )->get();

        return $telefonos;

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
            'DEPARTAMENTO',
            'MARCA',
            'MODELO',
            'USUARIO PRINCIPAL',
            'NUMERO TELÉFONO',
            'CORREO',
            'PUESTO',
            'OBSERVACIONES'
        ];

    }


}