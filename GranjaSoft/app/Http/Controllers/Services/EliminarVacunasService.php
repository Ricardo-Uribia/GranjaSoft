<?php 
namespace App\Http\Controllers\Services;
use App\Http\Controllers\Controller;
use App\Contracts\IOperaciones;
use App\Contracts\IProductSearchable;

class EliminarVacunasService 	
	extends Controller
	implements IEliminarvacunas{

	public function eliminar($id)
    {
        //$inventario=Vacunas::where("nombre", $nombre)->first();
        $inventario=vacunas::find($id);
		$inventario->delete($id);
        return response("Se a eliminado correctamente");
    }
try{
        $inventario=Vacunas::find($id);
		$inventario->delete($id);
        return response("No se a podido eliminar");
}
catch(RequestException $e){
	var_dump($e);
		}
	}


 ?>