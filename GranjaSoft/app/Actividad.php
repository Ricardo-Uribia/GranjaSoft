<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'actividades';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['empleado_id', 'tipo_de_tarea', 'fecha_de_inicio', 'fecha_de_finalizacion'];

    public function empleados()
    {
        return $this->belongsTo('App\Empleado');
    }
    
}
