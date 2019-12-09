<?php 
namespace App\Http\Controllers\Services;
use App\Vacunas;
use App\Http\Controllers\Controller;
use App\Contracts\IOperaciones;
use App\Contracts\IProductSearchable;
use Illuminate\Support\Facades\DB;

class EliminarVacunasService 	
	extends Controller
	implements IEliminarvacunas{

	public function eliminar($id)
    {
        
        $inventario=Vacunas::find(1);
        $response ->assertJson('r'=>1);
        $sql = "SELECT * FROM vacuans WHERE id = $id";
        // Conseguimos el objeto
		$vac=vacuans::where('nombre', '=', "viruela aviar")->first();
 
		// Lo eliminamos de la base de datos
		$vac->delete();

	}
}

 