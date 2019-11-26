<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nave extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'naves';

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
    protected $fillable = ['nave_id', 'secciones', 'tipo_de_nave'];

    public function granjas()
    {
        return $this->belongsTo('App\Models\Granja');
    }
    public function empleados()
    {
        return $this->hasMany('App\Models\Granja');
    }
    
}
