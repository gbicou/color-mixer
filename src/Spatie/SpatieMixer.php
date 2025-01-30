<?php

namespace Bicou\ColorMixer\Spatie;

use Bicou\ColorMixer\Mixer;
use Bicou\ColorMixer\MixerImplementation;
use Bicou\ColorMixer\SRGBConversions;
use Spatie\Color\Color as SpatieColorInterface;
use Spatie\Color\Rgb;

/**
 * Color mixer adapter.
 *
 * @implements MixerImplementation<SpatieColorInterface>
 */
class SpatieMixer extends Mixer implements MixerImplementation
{
    public function __construct(
        SpatieColorInterface $begin,
        SpatieColorInterface $end,
    ) {
        parent::__construct(new SpatieColor($begin), new SpatieColor($end));
    }

    public function mix(float $ratio): SpatieColorInterface
    {
        $color = $this->at($ratio);

        [$r, $g, $b] = SRGBConversions::LinearToSRGB($color->getRed(), $color->getGreen(), $color->getBlue());

        return new Rgb((int) round($r), (int) round($g), (int) round($b));
    }
}
