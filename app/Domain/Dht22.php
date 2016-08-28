<?php

namespace Raspberium\Domain;

use Raspberium\Contracts\Gpio;

class DHT22 extends Gpio
{
    
    
    public function read() {
        // usage: loldht <pin> (<tries>)
        $return_var = 0;
        exec('sudo loldht '.$this->getPinId(), $output, $return_var);
        return $output[0];
    }

}