<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tarjeta;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as RequestFacade;
use PDF;

class TarjetasController extends Controller
{
    

    public function store(){

        $data = RequestFacade::validate([

            'nombre' => ['required'],
            'apellidos' => ['required'],
            'correo' => ['required'],
            'dni' => ['required'],
            'icc' => ['required'],
            'telefono' => ['required'],
            'extension' => ['required'],
            'pin' => ['required'],
            'puk' => ['required'],
            'tipo_contrato' => ['required'],
            'servicios_adicionales' => ['required'],
            'departamento' => ['required'],
            'fecha_recogida' => ['required'],
            'fecha_alta' => ['required'],
            'estado' => ['required'],
            'departamento' => ['required'],
            'foto_sim' => ['nullable'],
            'firma' => ['required']

        ],
        [

            'nombre.required' => 'El nombre es obligatorio',
            'apellidos.required' => 'Los apellidos son obligatorios',
            'correo.required' => 'El correo es obligatorio',
            'dni.required' => 'El DNI es obligatorio',
            'telefono.required' => 'El teléfono es obligatorio',
            'extension.required' => 'La extensión es obligatoria',
            'pin.required' => 'El PIN es obligatorio',
            'puk.required' => 'El PUK es obligatorio',
            'tipo_contrato.required' => 'El tipo de contrato es obligatorio',
            'servicios_adicionales.required' => 'Los servicios adicionales son obligatorios',
            'fecha_recogida.required' => 'La fecha de recogida es obligatoria',
            'estado.required' => 'El estado es obligatorio',
            'departamento.required' => 'El departamento es obligatorio',
            

        ]);

        $tarjeta = Tarjeta::create([

            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
            'correo' => $data['correo'],
            'dni' => $data['dni'],
            'icc' => $data['icc'],
            'telefono' => $data['telefono'],
            'extension' => $data['extension'],
            'pin' => $data['pin'],
            'puk' => $data['puk'],
            'tipo_contrato' => $data['tipo_contrato'],
            'servicios_adicionales' => $data['servicios_adicionales'],
            'fecha_recogida' => $data['fecha_recogida'],
            'fecha_alta' => $data['fecha_alta'],
            'estado' => $data['estado'],
            'departamento' => $data['departamento'],
            'foto_sim' => $data['foto_sim'],
            'firma' => $data['firma']
        ]);

        return redirect('/dispositivos')->with('mensaje','Tarjeta añadida correctamente');

    }

    public function edit($id){

        return Inertia::render('Dispositivos/Tarjetas/Edit',[

            'tarjeta' => Tarjeta::find($id)

        ]);
    }

    public function update(Request $request,$id){

        $request-> validate([

            'nombre' => ['required'],
            'apellidos' => ['required'],
            'correo' => ['required'],
            'dni' => ['required'],
            'icc' => ['required'],
            'telefono' => ['required'],
            'extension' => ['required'],
            'pin' => ['required'],
            'puk' => ['required'],
            'tipo_contrato' => ['required'],
            'servicios_adicionales' => ['required'],
            'fecha_recogida' => ['required'],
            'fecha_alta' => ['required'],
            'estado' => ['required'],
            'departamento' => ['required'],
            'foto_sim' => ['nullable'],
            'firma' => ['nullable'],
            

        ],
        [

            'nombre.required' => 'El nombre es obligatorio',
            'apellidos.required' => 'Los apellidos son obligatorios',
            'correo.required' => 'El correo es obligatorio',
            'dni.required' => 'El DNI es obligatorio',
            'telefono.required' => 'El teléfono es obligatorio',
            'extension.required' => 'La extensión es obligatoria',
            'pin.required' => 'El PIN es obligatorio',
            'puk.required' => 'El PUK es obligatorio',
            'tipo_contrato.required' => 'El tipo de contrato es obligatorio',
            'servicios_adicionales.required' => 'Los servicios adicionales son obligatorios',
            'fecha_recogida.required' => 'La fecha de recogida es obligatoria',
            'estado.required' => 'El estado es obligatorio',
            'departamento.required' => 'El departamento es obligatorio',

        ]);

        $tarjeta = Tarjeta::where('id',$id);

        $tarjeta->update([

            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'correo' => $request->correo,
            'dni' => $request->dni,
            'telefono' => $request->telefono,
            'extension' => $request->extension,
            'pin' => $request->pin,
            'puk' => $request->puk,
            'tipo_contrato' => $request->tipo_contrato,
            'servicios_adicionales' => $request->servicios_adicionales,
            'estado' => $request->estado,
            'fecha_recogida' => $request->fecha_recogida,
            'fecha_alta' => $request->fecha_alta, 
            'departamento' => $request->departamento,
            'foto_sim' => $request->foto_sim,
            'firma' => $request->firma
            

        ]);

        return redirect('/dispositivos')->with('mensaje', 'Tarjeta actualizada correctamente');


    }

    public function show($id){


        return Inertia::render('Dispositivos/Tarjetas/Show',[

            'tarjeta' => Tarjeta::find($id),
            
        ]);


    }

    public function delete($id){

        Tarjeta::find($id)->delete();

        return redirect('/dispositivos')->with('mensaje','Tarjeta eliminada correctamente');

    }


}
