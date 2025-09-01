<?php

namespace App\Livewire\Admin;


use App\Models\Sesion as SesionModel;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Attributes\On; 
class Sesion extends Component
{
    public $modal = false;
    public $idSesion;
    public $dataEditar;
    #[Validate('required')]
    public $nombre;
    public function render()
    {
        $data = SesionModel::where('estado', 'activo')->get();
        // dd($data);
        return view('livewire.admin.sesion', compact('data'))->extends('welcome')->section('content'); // tu layout base
    }
    public function abrirModal()
    {
        $this->modal = true;
    }
    public function cerrarModal()
    {
        $this->modal = false;
        $this->nombre = "";
        return redirect()->to('/sesiones');
    }
    public function agregarSeccion()
    {
       if ($this->idSesion == null) {
        // CREAR
        SesionModel::create([
            'nombre' => $this->nombre
        ]);
    } else {
        // EDITAR
        $sesion = $this->dataEditar;
        if ($sesion) {
            $sesion->update([
                'nombre' => $this->nombre
            ]);
        }
    }

        $this->cerrarModal();
        return redirect()->to('/sesiones');
    }
    public function  editarSesion($id)
    {
        $this->dataEditar = SesionModel::find($id);
        if ($this->dataEditar) {
            $this->nombre = $this->dataEditar->nombre; // usa -> en vez de ['']
            $this->idSesion = $this->dataEditar->id;
            $this->abrirModal();
        } 
    }
    #[On('eliminarSesion')]
    public function eliminarSesion($id){
        $data=SesionModel::find($id);
        $data->update([
            'estado'=>'inactivo'
        ]);
        return redirect()->to('/sesiones');

    }
}
