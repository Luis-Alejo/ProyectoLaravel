<?php

use App\Http\Controllers\EspecialidadesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetallePagoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\TratamientoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('especialidades', EspecialidadesController::class);
    Route::resource('tratamientos', TratamientoController::class);
    Route::resource('pacientes', PacienteController::class);
    //Route::resource('pagos', DetallePagoController::class);
    Route::get('pagos/create/{tratamiento}', [DetallePagoController::class, 'create'])->name('pagos.create');
    Route::post('pagos', [DetallePagoController::class, 'store'])->name('pagos.store');

});
//Route::resource('especialidades', EspecialidadesController::class);
