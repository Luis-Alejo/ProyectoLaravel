<?php

namespace App\Http\Controllers;

use App\Models\Especialidades;
use App\Http\Controllers\Controller;
use App\Http\Requests\EspecialidadesStoreRequest;
use App\Http\Requests\EspecialidadesUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EspecialidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $especialidades = Especialidades::latest()->paginate(5);

        return view('especialidades.index', compact('especialidades'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('especialidades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EspecialidadesStoreRequest $request): RedirectResponse
    {
        Especialidades::create($request->validated());
        
        return redirect()->route('especialidades.index')
        ->with('success', 'Especialidad agregada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Especialidades $especialidades): View
    {
        return view('especialidades.show', compact('especialidades'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Especialidades $especialidades): View
    {
        return view('especialidades.edit', compact('especialidades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        EspecialidadesUpdateRequest $request, Especialidades $especialidades
    ): RedirectResponse
    {
        $especialidades->update($request->validated());

        return redirect()->route('especialidades.index')
        ->with('success', 'Especialidad actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Especialidades $especialidades)
    {
        $especialidades->delete();

        return redirect()->route('especialidades.index')
        ->with('success', 'Especialidad eliminada correctamente');
    }
}
