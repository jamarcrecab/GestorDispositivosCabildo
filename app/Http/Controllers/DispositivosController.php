<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Dispositivo;
use App\Models\Ordenador;
use App\Models\MaquinaFichar;
use App\Models\Tarjeta;
use App\Models\Telefono;
use App\Models\Grabadora;
use App\Models\Impresora;
use App\Models\Zona;
use App\Models\Departamento;
use Illuminate\Support\Facades\Request as RequestFacade;

class DispositivosController extends Controller
{

        public function index(){        

            return Inertia::render('Home',[

            'ordenadores' => Ordenador::query()
                            ->when(RequestFacade::input('busquedaOrdenadores'), function($query,$busqueda){
                              $query->where('nombre_dispositivo','like','%'.$busqueda.'%')
                              ->orWhere('id_dispositivo','like','%'.$busqueda.'%')
                              ->orWhere('ip_principal','like','%'.$busqueda.'%')
                              ->orWhere('ip_secundaria','like','%'.$busqueda.'%')
                              ->orWhere('procesador','like','%'.$busqueda.'%')
                              ->orWhere('so','like','%'.$busqueda.'%')
                              ->orWhere('ram','like','%'.$busqueda.'%')
                              ->orWhere('programa_ofimatica','like','%'.$busqueda.'%')
                              ->orWhere('licencia_office','like','%'.$busqueda.'%')
                              ->orWhere('licencia_windows','like','%'.$busqueda.'%')
                              ->orWhere('correo_office','like','%'.$busqueda.'%')
                              ->orWhere('usuario_principal','like','%'.$busqueda.'%')
                              ->orWhere('usuario_dominio','like','%'.$busqueda.'%')
                              ->orWhere('dominio','like','%'.$busqueda.'%')
                              ->orWhere('departamento','like','%'.$busqueda.'%')
                              ->orWhere('cabildo','like','%'.$busqueda.'%')
                              ->orWhere('fecha_instalacion','like','%'.$busqueda.'%')
                              ->orWhere('tecnico_informatico','like','%'.$busqueda.'%');
                            })->orderBy('nombre_dispositivo')
                              ->paginate(10),
                          

            'tarjetas' => Tarjeta::query()
                          ->when(RequestFacade::input('busquedaTarjetas'), function($query,$busqueda){
                            $query->where('nombre','like','%'.$busqueda.'%')
                            ->orWhere('apellidos','like','%'.$busqueda.'%')
                            ->orWhere('dni','like','%'.$busqueda.'%')
                            ->orWhere('icc','like','%'.$busqueda.'%')
                            ->orWhere('telefono','like','%'.$busqueda.'%')
                            ->orWhere('extension','like','%'.$busqueda.'%')
                            ->orWhere('pin','like','%'.$busqueda.'%')
                            ->orWhere('puk','like','%'.$busqueda.'%')
                            ->orWhere('estado','like','%'.$busqueda. '%')
                            ->orWhere('tipo_contrato','like','%'.$busqueda.'%');
                          })->orderBy('nombre')
                            ->paginate(10),

          'telefonos' => Telefono::with('dispositivo')->join('dispositivos','dispositivos.id','=','telefonos.id_dispositivo')
                          ->when(RequestFacade::input('busquedaTelefonos'), function($query,$busqueda){
                            $query->where('numero_serie','like','%'.$busqueda.'%')
                            ->orWhere('conexion','like','%'.$busqueda.'%')
                            ->orWhere('zona_trabajo','like','%'.$busqueda.'%')
                            ->orWhere('departamento','like','%'.$busqueda.'%')
                            ->orWhere('marca','like','%'.$busqueda.'%')
                            ->orWhere('modelo','like','%'.$busqueda.'%')
                            ->orWhere('usuario_principal','like','%'.$busqueda.'%')
                            ->orWhere('numero_telefono','like','%'.$busqueda.'%')
                            ->orWhere('correo','like','%'.$busqueda.'%')
                            ->orWhere('puesto','like','%'.$busqueda.'%');
                          })->orderBy('usuario_principal')
                          ->paginate(10),
                        
          'maquinasfichar' => MaquinaFichar::with('dispositivo')->join('dispositivos','dispositivos.id','=','maquina_fichars.id_dispositivo')
                              ->when(RequestFacade::input('busquedaMaquinasFichar'),function($query,$busqueda){
                              $query->where('dispositivos.nombre_dispositivo','like','%'.$busqueda.'%')
                              ->orWhere('numero_serie','like','%'.$busqueda.'%')
                              ->orWhere('tipo_dispositivo','like','%'.$busqueda.'%')
                              ->orWhere('conexion','like','%'.$busqueda.'%')
                              ->orWhere('zona_trabajo','like','%'.$busqueda.'%')
                              ->orWhere('ip_principal','like','%'.$busqueda.'%');
                              })->orderBy('dispositivos.nombre_dispositivo')
                              ->paginate(10),
           
           'impresoras' => Impresora::with('dispositivo')->join('dispositivos','dispositivos.id','=','impresoras.id_dispositivo')
                            ->when(RequestFacade::input('busquedaImpresoras'), function($query,$busqueda){
                              $query->where('numero_serie','like','%'.$busqueda.'%')
                              ->orWhere('tipo_dispositivo','like','%'.$busqueda.'%')
                              ->orWhere('zona_trabajo','like','%'.$busqueda.'%')
                              ->orWhere('marca','like','%'.$busqueda.'%')
                              ->orWhere('modelo','like','%'.$busqueda.'%')
                              ->orWhere('ip_principal','like','%'.$busqueda.'%')
                              ->orWhere('ip_secundaria','like','%'.$busqueda.'%')
                              ->orWhere('cabildo','like','%'.$busqueda.'%');
                            })->orderBy('modelo')
                              ->paginate(10),
            
          'grabadoras' => Grabadora::with('dispositivo')->join('dispositivos','dispositivos.id','=','grabadoras.id_dispositivo')
                          ->when(RequestFacade::input('busquedaGrabadoras'),function($query,$busqueda){
                          $query->where('dispositivos.nombre_dispositivo','like','%'.$busqueda.'%')
                          ->orWhere('numero_serie','like','%'.$busqueda.'%')
                          ->orWhere('tipo_dispositivo','like','%'.$busqueda.'%')
                          ->orWhere('conexion','like','%'.$busqueda.'%')
                          ->orWhere('zona_trabajo','like','%'.$busqueda.'%')
                          ->orWhere('modelo','like','%'.$busqueda.'%');
                          })->orderBy('grabadoras.nombre_dispositivo')
                            ->paginate(10)
              
                          ]);
        }

        public function crear(){

          return Inertia::render('Dispositivos/Create');

        }

        public function delete($id){

            Dispositivo::find($id)->delete();

            return redirect('/dispositivos')->with('mensaje','Dispositivo eliminado correctamente');

        }

}
