<?php

namespace App\Livewire\Admin;

use App\Models\Dato;
use Livewire\Component;

class Datos extends Component
{
    public $nombre,$director,$ingreso;
    public function render()
    {
        return view('livewire.admin.datos')->extends('welcome')->section('content');
    }
    public function guardarDatos(){

        Dato::create([
            'nombre'=>$this->nombre,
            'director'=>$this->director,
            'hora_ingreso'=>$this->ingreso
        ]);
        $this->limpiarCampos();
        return redirect()->to('datos');
    }
    public function limpiarCampos(){
        $this->nombre="";
        $this->director="";
    $this->ingreso="";
    }
}
