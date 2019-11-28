<?php 

namespace App\Http\Controllers\Services;
use App\Http\Controllers\Controller;
use App\Contracts\IOperaciones;
use App\Contracts\IProductSearchable;
use Illuminate\Support\Facades\DB;

class VacunasVencidasService 	
	extends Controller
	implements IVacunasVencidas{

    public function mostrar(Request $mes1, $mes2 ){

        if ($mes1 && $mes2 ) {
            //Hace la busqueda por medio de las siguientes variables
           
            $inventario=Vacunas::between('nombre', $mes1, $mes2)->get();
            return array('vacuna'=>$vacunas);


 ?>
