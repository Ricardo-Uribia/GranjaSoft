<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacunas extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vacunas';

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
    protected $fillable = ['vacuna_id', 'nombre', 'tipo'];

    public function animales()
    {
        return $this->belongsTo('App\Animal');
    }
    
}
