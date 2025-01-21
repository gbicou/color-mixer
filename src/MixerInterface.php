<?php

namespace Bicou\ColorMixer;

/**
 * A mixer between two colors
 */
interface MixerInterface
{
    /**
     * Returns the start color in the gradient.
     *
     * @return ColorInterface The start color
     */
    public function getBegin(): ColorInterface;

    /**
     * Returns the stop color in the gradient.
     *
     * @return ColorInterface The stop color
     */
    public function getEnd(): ColorInterface;

    /**
     * Returns a color at the specified ratio between the start and stop colors.
     *
     * @param float $ratio The ratio between the start (0.0) and stop (1.0) colors.
     * @return ColorInterface The interpolated color at the given ratio.
     */
    public function at(float $ratio): ColorInterface;
}
