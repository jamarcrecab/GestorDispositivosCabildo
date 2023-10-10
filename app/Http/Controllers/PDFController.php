<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarjeta;
use Barryvdh\DomPDF\Facade\PDF;
use Carbon\Carbon;

class PDFController extends Controller
{
    
    public function generatePDF($id){

        $tarjeta= Tarjeta::where('id',$id)->first();
        
        $link = file_get_contents("http://www.cabildofuer.es/documentos/Logotipos/Logo_CabBios_NegLong_SinConsej_RGB.jpg");
        $pdf= PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('generarpdf',
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
            'firma' => $tarjeta['firma'],
            'departamento' => $tarjeta['departamento'],
            'link' => $link
            
        ]);
        return $pdf->download();
        
    }

}
