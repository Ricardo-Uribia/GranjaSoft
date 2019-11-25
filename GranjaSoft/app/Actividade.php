<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividade extends Model
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
    protected $fillable = ['activida_id', 'nombre', 'empleado', 'actividad', 'dia', 'hora_inicio', 'hora_finaliza'];

    public function empleado()
    {
        return $this->belongsTo('App\Models\Empleado');
    }
    
}
