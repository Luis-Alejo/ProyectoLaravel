<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;
use App\Models\Paciente;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tratamientos = Tratamiento::all();
        return view('tratamientos.index', compact('tratamientos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pacientes = Paciente::all();
        return view('tratamientos.create', compact('pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'costo_total' => 'required',
            'paciente_id' => 'required|exists:pacientes,id',
        ]);

        Tratamiento::create($request->all());
        return redirect()->route('tratamientos.index')->with('success', 'Tratameitnto creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tratamiento $tratamientos): View
    {
        $paciente = $tratamientos->paciente;
        return view('tratamientos.show', compact('tratamientos', 'paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tratamiento $tratamientos): View
    {
        $pacientes = Paciente::all();
        return view('tratamientos.edit', compact('tratamientos', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tratamiento $tratamientos)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'costo_total' => 'required',
            'paciente_id' => 'required|exists:pacientes,id',
        ]);

        $tratamientos->update($request->all());
        return redirect()->route('tratamientos.index')->with('success', 'Tratamiento actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tratamiento $tratamiento)
    {
        $tratamiento->delete();

        return redirect()->route('tratamientos.index')
        ->with('success', 'Tratamiento eliminado correctamente');
    }
}
