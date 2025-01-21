<?php

namespace Bicou\Melange;

class ColorData extends Color
{
    public function __construct(
        private float $red,
        private float $green,
        private float $blue,
        private float $opacity = 1.0,
    ) {

    }
    public function getRed(): float
    {
        return $this->red;
    }

    public function getGreen(): float
    {
        return $this->green;
    }

    public function getBlue(): float
    {
        return $this->blue;
    }

    public function getOpacity(): float
    {
        return $this->opacity;
    }
}
