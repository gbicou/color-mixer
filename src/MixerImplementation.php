<?php

namespace Bicou\ColorMixer;

/**
 * A color mixer implementation with a color library.
 *
 * @template T the color interface from the library
 */
interface MixerImplementation
{
    /**
     * Mix colors based on the given ratio.
     *
     * @param float $ratio The ratio between the start (0.0) and stop (1.0) colors
     * @return T The color object at the given ratio
     */
    public function mix(float $ratio): mixed;
}
