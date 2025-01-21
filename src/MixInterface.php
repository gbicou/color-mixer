<?php

namespace Bicou\Melange;

interface MixInterface
{
    public function getBegin(): ColorInterface;

    public function getEnd(): ColorInterface;

    public function at(float $ratio): ColorInterface;
}
