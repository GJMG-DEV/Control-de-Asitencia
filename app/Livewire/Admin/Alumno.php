<?php

namespace App\Livewire\Admin;

use App\Models\Alumno as AlumnoModelo;
use App\Models\Sesion;
use Livewire\Component;

class Alumno extends Component
{
    public $modal = false;
    public $nombre;
    public $apePaterno;
    public $apeMaterno;
    public $idSeccion;
    public function render()
    {
        $data = AlumnoModelo::all();
        $seccion = Sesion::where('estado', 'activo')->get();
        return view('livewire.admin.alumno', compact('data', 'seccion'))->extends('welcome')->section('content');
    }
    public function abrirModal()
    {
        $this->modal = true;
    }
    public function cerrarModal()
    {
        $this->modal = false;
        $this->nombre = "";
        $this->apePaterno = "";
        $this->apeMaterno = "";
        $this->idSeccion = "";
    }
    public function agregarAlumno()
    {
       //() dd($this->nombre);
        AlumnoModelo::create([
            'nombre' => $this->nombre,
            'apePaterno' => $this->apePaterno,
            'apeMaterno' => $this->apeMaterno,
            'sesiones_id' => $this->idSeccion
        ]);
        $this->cerrarModal();
        return redirect()->to('/alumnos');
    }
}
