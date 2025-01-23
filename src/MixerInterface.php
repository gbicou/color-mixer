<?php

namespace Bicou\ColorMixer;

/**
 * A mixer between two colors.
 */
interface MixerInterface
{
    /**
     * Returns the start color in the mixer.
     *
     * @return ColorInterface The start color
     */
    public function getBegin(): ColorInterface;

    /**
     * Sets the start color in the mixer.
     *
     * @param ColorInterface $color The new start color
     *
     * @return static The current instance
     */
    public function setBegin(ColorInterface $color): static;

    /**
     * Returns the stop color in the mixer.
     *
     * @return ColorInterface The stop color
     */
    public function getEnd(): ColorInterface;

    /**
     * Sets the stop color in the mixer.
     *
     * @param ColorInterface $color The new stop color
     *
     * @return static The current instance
     */
    public function setEnd(ColorInterface $color): static;

    /**
     * Returns a color at the specified ratio between the start and stop colors.
     *
     * @param float $ratio The ratio between the start (0.0) and stop (1.0) colors.
     *
     * @return ColorInterface the interpolated color at the given ratio
     */
    public function at(float $ratio): ColorInterface;
}
