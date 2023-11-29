<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    use HasFactory;

    protected $fillable = [

        'nombre',
        'apellidos',
        'correo',
        'dni',
        'icc',
        'telefono',
        'extension',
        'pin',
        'puk',
        'tipo_contrato',
        'servicios_adicionales',
        'fecha_recogida',
        'fecha_alta',
        'estado',
        'departamento',
        'puesto',
        'foto_sim',
        'firma',
        
    ];

    protected $hidden = [

        'created_at',
        'updated_at'

    ];

}
