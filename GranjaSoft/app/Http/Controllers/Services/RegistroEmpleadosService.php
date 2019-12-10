<?php

namespace App\Http\Controllers\Services;
use App\Http\Controllers\Controller;
use App\Contracts\IRegistroEmpleados;
use App\Empleado;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistroEmpleadosService extends Controller implements IRegistroEmpleados{
    public function registro($nombre, $puesto, $edad, $granja_id){

        $empleado=Empleado::create([
            'nombre'=>$nombre,
            'edad'=>$edad,
            'puesto'=>$puesto,
            'granja_id'=>$granja_id
        ]);
    }
}