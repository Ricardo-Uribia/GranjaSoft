<?php 

namespace App\Contracts;

interface IEliminarvacunas{
	//Orden de ELiminar las vacunas vencidas de la base de datos
	public function eliminar($id);
}
