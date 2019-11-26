<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Granja extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'granjas';

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
    protected $fillable = ['nombre', 'tipo'];

    public function empleados()
    {
        return $this->hasMany('App\Empleado');
    }
    
}
