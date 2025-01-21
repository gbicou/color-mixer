<?php

namespace Bicou\Melange;

interface MelangeInterface
{
    public static function mix(ColorInterface $color1, ColorInterface $color2, float $ratio): mixed;
}
