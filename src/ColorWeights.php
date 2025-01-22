<?php

namespace Bicou\ColorMixer;

readonly class ColorWeights
{
    public function __construct(
        public float $w,
        public float $c,
        public float $m,
        public float $y,
        public float $r,
        public float $g,
        public float $b,
    ) {
    }

    /**
     * Get the set of weights for spectral mixing.
     *
     * @return ColorWeights The color weights
     */
    public static function of(ColorInterface $color): ColorWeights
    {
        $w = min($color->getRed(), $color->getGreen(), $color->getBlue());
        $lrgb = [$color->getRed() - $w, $color->getGreen() - $w, $color->getBlue() - $w];

        $c = min($lrgb[1], $lrgb[2]);
        $m = min($lrgb[0], $lrgb[2]);
        $y = min($lrgb[0], $lrgb[1]);
        $r = max(0, min($lrgb[0] - $lrgb[2], $lrgb[0] - $lrgb[1]));
        $g = max(0, min($lrgb[1] - $lrgb[2], $lrgb[1] - $lrgb[0]));
        $b = max(0, min($lrgb[2] - $lrgb[1], $lrgb[2] - $lrgb[0]));

        return new self($w, $c, $m, $y, $r, $g, $b);
    }
}
