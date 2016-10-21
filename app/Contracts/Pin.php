<?php

namespace Raspberium\Contracts;

interface Pin
{

    /**
     * @param int $pinId
     * @return string
     */
    public function setHigh($pinId);

    /**
     * @param int $pinId
     * @return string
     */
    public function setLow($pinId);

    /**
     * @param int $pinId
     * @return string
     */
    public function readGPIO($pinId);
}