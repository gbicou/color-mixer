<?php

namespace Bicou\ColorMixer;

/**
 * An immutable color in the linear RGB space.
 */
interface ColorInterface
{
    /**
     * Get the linear red component of the color.
     *
     * @return float The red component value (0.0 - 1.0)
     */
    public function getRed(): float;

    /**
     * Get the linear green component of the color.
     *
     * @return float The green component value (0.0 - 1.0)
     */
    public function getGreen(): float;

    /**
     * Get the linear blue component of the color.
     *
     * @return float The blue component value (0.0 - 1.0)
     */
    public function getBlue(): float;

    /**
     * Get the opacity component of the color.
     *
     * @return float The opacity value (0.0 - 1.0)
     */
    public function getOpacity(): float;
}
