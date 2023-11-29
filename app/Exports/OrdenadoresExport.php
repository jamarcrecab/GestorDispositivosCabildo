<?php

namespace App\Exports;

use App\Models\Ordenador;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdenadoresExport implements FromCollection,WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {

        $ordenadores= Ordenador::join('dispositivos','dispositivos.id','=','ordenadors.id_dispositivo')
        ->select(
            'dispositivos.id','dispositivos.nombre_dispositivo','dispositivos.numero_serie','dispositivos.tipo_dispositivo','dispositivos.conexion','dispositivos.zona_trabajo',
            'ordenadors.ip_principal','ordenadors.ip_secundaria','ordenadors.procesador','ordenadors.so','ordenadors.ram','ordenadors.discoduro','ordenadors.programa_ofimatica','ordenadors.licencia_office',
            'ordenadors.licencia_windows','ordenadors.correo_office','ordenadors.usuario_principal','ordenadors.usuario_dominio','ordenadors.dominio','ordenadors.departamento','ordenadors.cabildo','ordenadors.fecha_instalacion','ordenadors.tecnico_informatico','ordenadors.observaciones'
        )->get();
        
            return $ordenadores;
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
            'IP SECUNDARIA',
            'PROCESADOR',
            'SISTEMA OPERATIVO',
            'RAM',
            'DISCO DURO',
            'PROGRAMA OFIMATICA',
            'LICENCIA OFFICE',
            'LICENCIA WINDOWS',
            'CORREO OFFICE',
            'USUARIO PRINCIPAL',
            'USUARIO DOMINIO',
            'DOMINIO',
            'DEPARTAMENTO',
            'CABILDO',
            'FECHA INSTALACION',
            'TECNICO INFORMATICO',
            'OBSERVACIONES'
        ];

    }
}