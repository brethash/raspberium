<?php

namespace Raspberium\Contracts;

interface Pin
{

    /**
     * @param int $pinId
     * @param string $status
     * @return string
     */
    public function writeGPIO($pinId, $status);

    /**
     * @param int $pinId
     * @return string
     */
    public function readGPIO($pinId);
}