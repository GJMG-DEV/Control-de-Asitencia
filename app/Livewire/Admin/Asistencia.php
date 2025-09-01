<?php

namespace App\Livewire\Admin;

use App\Models\Alumno;
use App\Models\Sesion;
use Livewire\Component;

use App\Models\Asistencia as AsistenciaModel;
class Asistencia extends Component
{
    public $selectSesion = '';
    public $dataAlumno = [];
    public $asistencias = []; // array de checkboxes

      public $seccion_id;
    public $alumnos = [];
   
     public function updatedSelectSesion($value)
    {  $this->dataAlumno = Alumno::where('sesiones_id', $value)->get();

        // Inicializamos los checkboxes como false (no asistió)
        $this->asistencias = $this->dataAlumno->pluck('id')->mapWithKeys(fn($id) => [$id => false])->toArray();
    }
    public function render()
    {
        // siempre cargo las sesiones
        $dataSesion = Sesion::where('estado', 'activo')->get();
        return view('livewire.admin.asistencia', [
            'dataSesion' => $dataSesion,
        ])->extends('welcome')->section('content'); // tu layout base;
    }
    public function registrarAsistencia()
    {
        foreach ($this->asistencias as $alumnoId => $asistio) {
            AsistenciaModel::create([
                'fecha' => now()->toDateString(),
                'asistencia' => $asistio, // true o false
                'alumnos_id' => $alumnoId,
            ]);
        }

        $this->dispatch('success', 'Asistencia registrada correctamente ✅');
    }
}
