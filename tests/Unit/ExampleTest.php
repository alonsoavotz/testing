<?php

namespace Tests\Unit;

use App\Models\Calculadora;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{

    /** @test */
    function probando_el_metodo_suma() : void
    {
        // AAA
        $calculadora = new Calculadora();

        $result = $calculadora->suma(2, 3);

        $this->assertEquals(5, $result);
    }

    /** @test */
    function probando_el_metodo_resta() : void {
        $calculadora = new Calculadora();

        $result = $calculadora->resta(2, 2);

        $this->assertEquals(0, $result);
    }
        
    

}
