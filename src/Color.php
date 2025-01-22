<?php

namespace Bicou\ColorMixer;

/**
 * Basic immutable color data in the linear RGB space.
 */
class Color extends ColorBase
{
    /**
     * Create a new color from components.
     *
     * @param float $red     Linear red component (0.0 - 1.0)
     * @param float $green   Linear green component (0.0 - 1.0)
     * @param float $blue    Linear blue component (0.0 - 1.0)
     * @param float $opacity Linear opacity (0.0 - 1.0), default 1.0
     */
    public function __construct(
        private readonly float $red,
        private readonly float $green,
        private readonly float $blue,
        private readonly float $opacity = 1.0,
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
