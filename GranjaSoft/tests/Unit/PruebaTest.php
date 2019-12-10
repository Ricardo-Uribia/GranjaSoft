<?php

namespace Tests\Unit;

use App\Vacunas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\DB;

class PruebaTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
   
		$inventario=Vacunas::find(1);
    
        $inventario=$this->assertTrue(true);
    }
}
