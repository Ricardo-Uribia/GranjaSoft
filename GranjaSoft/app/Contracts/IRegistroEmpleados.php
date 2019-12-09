<?php

namespace App\Contracts;

interface IRegistroEmpleados{
	
	public function registro($nombre, $puesto, $edad, $granja_id);
}