<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    // Mostrar todos los pacientes
    public function index()
    {
        $pacientes = Paciente::all();
        return view('pacientes.index', compact('pacientes'));
    }

    // Mostrar formulario para crear paciente
    public function create()
    {
        return view('pacientes.create');
    }

    // Guardar nuevo paciente
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
        ]);

        Paciente::create($request->all());
        return redirect()->route('pacientes.index')->with('success', 'Paciente creado correctamente.');
    }

    // Mostrar un paciente específico
    public function show(Paciente $paciente)
    {
        return view('pacientes.show', compact('paciente'));
    }

    // Mostrar formulario para editar paciente
    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    // Actualizar paciente
    public function update(Request $request, Paciente $paciente)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
        ]);

        $paciente->update($request->all());
        return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado correctamente.');
    }

    // Eliminar paciente
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado correctamente.');
    }
}
