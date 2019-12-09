<?php

namespace App\Http\Controllers\Services;
use App\Http\Controllers\Controller;
use App\Contracts\IRegistroEmpleados;
use App\Empleado;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistroEmpleadosService extends Controller implements IRegistroEmpleados{
    public function registro($nombre, $edad, $puesto, $granja_id){

            $this->validate([
                'nombre' => 'required|min:4',
                'edad' => 'required|min:2',
                'puesto' => 'required',
                'granja_id' => 'required'
            ]);

                Empleado::create($request->all());
                    return redirect('/empleados');
            }

}