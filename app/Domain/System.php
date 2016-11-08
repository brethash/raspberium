<?php

namespace Raspberium\Domain;

use Exception;

class System {

    public function restart()
    {
        // Send restart command to OS
        $this->writeFile('/var/www/raspberium/restart-server','restart');
        echo 'System is going down for reboot now!';
    }

    public function shutdown()
    {
        // Send shutdown command to OS
        $this->writeFile('/var/www/raspberium/shutdown-server','shutdown');
        echo 'System is going down for shutdown now!';
    }

    private function writeFile($filename,$content)
    {
        try {
            $file = fopen($filename, "w");
            fwrite($file, $content);
            close($file);
        }
        catch (Exception $e) {
            echo $e;
        }
    }
}