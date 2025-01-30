<?php

namespace Bicou\ColorMixer\Spatie;

use Bicou\ColorMixer\Mixer;
use Bicou\ColorMixer\SRGBConversions;
use Spatie\Color\Color as SpatieColorInterface;
use Spatie\Color\Rgb;

/**
 * Color mixer adapter.
 */
class SpatieMixer extends Mixer
{
    public function __construct(
        SpatieColorInterface $begin,
        SpatieColorInterface $end,
    ) {
        parent::__construct(new SpatieColor($begin), new SpatieColor($end));
    }

    public function atSpatie(float $ratio): SpatieColorInterface
    {
        $color = $this->at($ratio);

        [$r, $g, $b] = SRGBConversions::LinearToSRGB($color->getRed(), $color->getGreen(), $color->getBlue());

        return new Rgb($r, $g, $b);
    }
}
