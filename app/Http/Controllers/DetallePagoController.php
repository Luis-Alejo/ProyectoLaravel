<?php

namespace App\Http\Controllers;

use App\Models\DetallePago;
use App\Models\Tratamiento;
use Illuminate\Http\Request;

class DetallePagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($tratamiento_id)
    {
        $tratamiento = Tratamiento::findOrFail($tratamiento_id);
        return view('pagos.create', compact('tratamiento_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tratamiento_id' => 'required|exists:tratamientos,id',
            'monto' => 'required|numeric|min:0',
            'metodo_pago' => 'required|string|max:50',
        ]);

        DetallePago::create($request->all());
        $tratamiento = Tratamiento::findOrFail($request->tratamiento_id);
        $tratamiento->monto_pagado += $request->monto;
        if ($tratamiento->monto_pagado >= $tratamiento->costo_total) {
            $tratamiento->estado = 'Pagado';
        } else {
            $tratamiento->estado = 'Parcial';
        }
        $tratamiento->save();
        return redirect()->route('tratamientos.index')->with('success', 'Pago agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DetallePago $detallePago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetallePago $detallePago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetallePago $detallePago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetallePago $detallePago)
    {
        //
    }
}
