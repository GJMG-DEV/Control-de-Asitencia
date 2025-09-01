<?php

use App\Livewire\Admin\Alumno;
use App\Livewire\Admin\Asistencia;
use App\Livewire\Admin\Sesion;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sesiones', Sesion::class)->name('sesiones');
Route::get('/alumnos', Alumno::class)->name('alumnos');
Route::get('/asistencias', Asistencia::class)->name('asistencias');