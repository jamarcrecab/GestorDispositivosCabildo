<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarjeta;
use App\Models\Telefono;
use Barryvdh\DomPDF\Facade\PDF;
use Carbon\Carbon;

class PDFController extends Controller
{
    
    public function generatePDFTarjetas($id){

        $tarjeta= Tarjeta::where('id',$id)->first();
        
        $pdf= PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('generarpdftarjetas',
        [
            'nombre' => $tarjeta['nombre'],
            'apellidos' => $tarjeta['apellidos'],
            'correo' => $tarjeta['correo'],
            'dni' => $tarjeta['dni'],
            'icc' => $tarjeta['icc'],
            'telefono' => $tarjeta['telefono'],
            'extension' => $tarjeta['extension'],
            'pin' => $tarjeta['pin'],
            'puk' => $tarjeta['puk'],
            'tipo_contrato' => $tarjeta['tipo_contrato'],
            'servicios_adicionales' => $tarjeta['servicios_adicionales'],
            'fecha_recogida' => $tarjeta['fecha_recogida'],
            'fecha_alta' => $tarjeta['fecha_alta'],
            'estado' => $tarjeta['estado'],
            'foto_sim' => $tarjeta['foto_sim'],
            'departamento' => $tarjeta['departamento'],
            
        ]);
        return $pdf->download();
        
    }

    public function generatePDFTelefonos($id){

        $telefono =Telefono::join('dispositivos','dispositivos.id','=','telefonos.id_dispositivo')->where('id_dispositivo',$id)->first();

        $pdf= PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('generarpdftelefonos',
        [
            'nombre' => $telefono['nombre_dispositivo'],
            'imei' => $telefono['numero_serie'],
            'conexion' => $telefono['conexion'],
            'zona_trabajo' => $telefono['zona_trabajo'],
            'departamento' => $telefono['departamento'],
            'marca' => $telefono['marca'],
            'modelo' => $telefono['modelo'],
            'usuario_principal' => $telefono['usuario_principal'],
            'numero_telefono' => $telefono['numero_telefono'],
            'correo' => $telefono['correo'],
            'puesto' => $telefono['puesto'],
            'observaciones' => $telefono['observaciones'],
        ]);

        

        return $pdf->download();

    }

}
