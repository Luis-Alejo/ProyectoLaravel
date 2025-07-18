<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'descripcion',
        'costo_total',
        'paciente_id',
        'estado',
        'monto_pagado'
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function detallePagos()
    {
        return $this->hasMany(DetallePago::class);
    }
}
