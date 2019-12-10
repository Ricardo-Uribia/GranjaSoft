<?php 

namespace App\Http\Controllers\Services;
use App\Http\Controllers\Controller;
use App\Contracts\IOperaciones;
use App\Contracts\IProductSearchable;
use Illuminate\Support\Facades\DB;


class VacunasVencidasService 	
	extends Controller
	implements IVacunasVencidas{

    public function mostrar(Request $mes ){

    	//Array de todos los registros
        $mes = DB::table('vacunas')->get();
        echo $mes[0]->id;
        //Array unico del primero en la columna 
        $mes = DB::table('vacunas')->first();
        echo $mes->id;


 ?>
