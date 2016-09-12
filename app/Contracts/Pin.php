<?php

namespace Raspberium\Contracts;

interface Pin
{

    /**
     * @param int $pinId
     * @param string $status
     * @return string
     */
    public function writeGPIO(int $pinId, string $status);

    /**
     * @param int $pinId
     * @return string
     */
    public function readGPIO(int $pinId);
}