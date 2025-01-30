<?php

namespace Bicou\ColorMixer\Spatie;

use Bicou\ColorMixer\Color;
use Bicou\ColorMixer\SRGBConversions;
use Spatie\Color\Color as SpatieColorInterface;

class SpatieColor extends Color
{
    public function __construct(
        SpatieColorInterface $color,
    ) {
        $rgb = $color->toRgb();

        [$r, $g, $b] = SRGBConversions::SRGBToLinear($rgb->red(), $rgb->green(), $rgb->blue());

        parent::__construct($r, $g, $b);
    }
}
