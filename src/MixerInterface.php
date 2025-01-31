<?php

namespace Bicou\ColorMixer;

/**
 * A mixer between two colors.
 *
 * @template T the color interface
 */
interface MixerInterface
{
    /**
     * Returns a color at the specified ratio between the start and stop colors.
     *
     * @param float $ratio The ratio between the start (0.0) and stop (1.0) colors.
     *
     * @return T the interpolated color at the given ratio
     */
    public function at(float $ratio): mixed;

    /**
     * Yields a sequence of colors from the start to the stop colors with the given number of stops.
     *
     * @param int $stops The number of intermediate colors
     *
     * @return iterable<T> a sequence of colors (including the start and stop colors)
     */
    public function iterate(int $stops): iterable;
}
