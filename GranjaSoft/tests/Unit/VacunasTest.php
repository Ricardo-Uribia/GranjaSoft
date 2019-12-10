<?php

namespace Tests\Unit;

use App\Vacunas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\DB;


class VacunasTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
   
		//Array de todos los registros
        $mes = DB::table('vacunas')->get();
        echo $mes[0]->id;
        //Array unico del primero en la columna 
        $mes = DB::table('vacunas')->first();
        echo $mes->id;
    }
}
