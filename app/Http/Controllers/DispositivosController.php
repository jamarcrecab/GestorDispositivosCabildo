<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Dispositivo;
use App\Models\Zona;
use App\Models\Departamento;
use App\Models\Tarjeta;
use Illuminate\Support\Facades\Request as RequestFacade;

class DispositivosController extends Controller
{

        public function index(){        

            return Inertia::render('Home',[

            'dispositivos' =>Dispositivo::query()
                          ->when(RequestFacade::input('busquedaDispositivos'), function($query,$busqueda) {
                          $query->where('nombre_dispositivo','like','%'.$busqueda.'%')
                          ->orWhere('numero_serie','like','%'.$busqueda.'%')
                          ->orWhere('tipo_dispositivo','like','%'.$busqueda.'%')
                          ->orWhere('conexion','like','%'.$busqueda.'%')
                          ->orWhere('zona_trabajo','like','%'.$busqueda.'%');
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
                            ->orWhere('tipo_contrato','like','%'.$busqueda.'%');

                          })->orderBy('telefono')
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
