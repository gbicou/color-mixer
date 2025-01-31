<?php

namespace Bicou\ColorMixer\Spatie;

use Bicou\ColorMixer\ColorInterface;
use Bicou\ColorMixer\Mixer;
use Bicou\ColorMixer\MixerInterface;
use Bicou\ColorMixer\SRGBConversions;
use Spatie\Color\Color as SpatieColorInterface;
use Spatie\Color\Rgb;

/**
 * Color mixer adapter.
 *
 * @implements MixerInterface<SpatieColorInterface>
 */
class SpatieMixer implements MixerInterface
{
    /** @var MixerInterface<ColorInterface> inner linear rgb mixer */
    private MixerInterface $mixer;

    public function __construct(
        SpatieColorInterface $begin,
        SpatieColorInterface $end,
    ) {
        $this->mixer = new Mixer(new SpatieColor($begin), new SpatieColor($end));
    }

    public function at(float $ratio): SpatieColorInterface
    {
        $color = $this->mixer->at($ratio);

        [$r, $g, $b] = SRGBConversions::LinearToSRGB($color->getRed(), $color->getGreen(), $color->getBlue());

        return new Rgb((int) round($r), (int) round($g), (int) round($b));
    }
}
