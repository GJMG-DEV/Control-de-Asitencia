<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Sesion;
class Alumno extends Model
{
    protected $guarded=['created_at','updated_at'];
    protected $table='alumnos';

    public function sesion() :BelongsTo{
        return $this->belongsTo(Sesion::class,'sesiones_id');
    }
}
