<?php

namespace Raspberium\Domain;

use Raspberium\Contracts\Gpio;

class DHT22 extends Gpio
{
    
    
    public function read() {
        // usage: loldht <pin> (<tries>)
        $return_var = 0;
        exec('sudo /usr/bin/loldht', $output, $return_var);

        // Return the last element in the array as this is the only one with usable data.
        return array_pop($output);
    }

}