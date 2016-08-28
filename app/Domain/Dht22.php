<?php

namespace Raspberium\Domain;

use Raspberium\Contracts\Gpio;

class DHT22 extends Gpio
{
    
    
    public function read() {
        // usage: loldht <pin> (<tries>)
        $return_var = 0;
        exec('loldht', $output, $return_var);
        return $output;
    }

}