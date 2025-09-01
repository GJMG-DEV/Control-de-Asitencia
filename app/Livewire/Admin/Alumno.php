<?php

namespace App\Livewire\Admin;

use App\Models\Alumno as AlumnoModelo;
use App\Models\Sesion;
use Livewire\Attributes\On;
use Livewire\Component;

class Alumno extends Component
{
    public $modal = false;
    public $nombre;
    public $apePaterno;
    public $apeMaterno;
    public $idSeccion;
    public $idAlumno;
    public $dataEditar;
    public function render()
    {
        $data = AlumnoModelo::with('sesion')->get();
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
       if($this->idAlumno== null){
         AlumnoModelo::create([
            'nombre' => $this->nombre,
            'apePaterno' => $this->apePaterno,
            'apeMaterno' => $this->apeMaterno,
            'sesiones_id' => $this->idSeccion
        ]);
       }else{
            // EDITAR
        $alumno = $this->dataEditar;
        if ($alumno) {
            $alumno->update([
                'nombre' => $this->nombre,
                'apePaterno' => $this->apePaterno,
                'apeMaterno' => $this->apeMaterno,
                'sesiones_id' => $this->idSeccion
            ]);
        }
       }
       
        $this->cerrarModal();
        return redirect()->to('/alumnos');
    }
    public function editarAlumno($id){
         $this->dataEditar = AlumnoModelo::find($id);
        if ($this->dataEditar) {
            $this->nombre = $this->dataEditar->nombre;
            $this->apePaterno=$this->dataEditar->apePaterno;
            $this->apeMaterno=$this->dataEditar->apeMaterno;
            $this->idSeccion=$this->dataEditar->sesiones_id;
            $this->idAlumno = $this->dataEditar->id;
            $this->abrirModal();
        } 
    }
    #[On('eliminarAlumno')]
    public function eliminarAlumno($id){
       
        AlumnoModelo::destroy($id);
       
        return redirect()->to('/alumnos');

    }
    
}
