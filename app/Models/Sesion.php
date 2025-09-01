<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Alumno;
class Sesion extends Model
{
    protected $guarded=['created_at','updated_at'];
    protected $table='sesiones';
    public function alumnos(): HasMany{
        return $this->hasMany(Alumno::class,'sesiones_id');
    }
}
