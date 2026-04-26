<?php

use App\Http\Controllers\EducationalController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EducationalController::class, 'home'])->name('home');
Route::get('/contenido', [EducationalController::class, 'contenido'])->name('contenido');
Route::get('/actividad/iniciar', [EducationalController::class, 'iniciarActividad'])->name('actividad.iniciar');
Route::get('/actividad', [EducationalController::class, 'actividad'])->name('actividad');
Route::get('/actividad/guardar', [EducationalController::class, 'guardarResultado'])->name('actividad.guardar');
Route::get('/resultados', [EducationalController::class, 'resultados'])->name('resultados');
Route::get('/practica', [EducationalController::class, 'practica'])->name('practica');
