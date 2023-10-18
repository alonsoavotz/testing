<?php 
namespace App\Models;

class Calculadora{

    public function suma($a, $b) : float {
        
        return $a + $b;
    }

    public function resta($a, $b) : float {
        
        return $a - $b;
    }

}