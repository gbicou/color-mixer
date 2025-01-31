<?php

namespace Bicou\ColorMixer;

abstract class ColorBase implements ColorInterface
{
    /**
     * Get the set of weights for spectral mixing.
     *
     * @return ColorWeights The color weights
     */
    public function getWeights(): ColorWeights
    {
        $w = min($this->getRed(), $this->getGreen(), $this->getBlue());
        $lrgb = [$this->getRed() - $w, $this->getGreen() - $w, $this->getBlue() - $w];

        $c = min($lrgb[1], $lrgb[2]);
        $m = min($lrgb[0], $lrgb[2]);
        $y = min($lrgb[0], $lrgb[1]);
        $r = max(0, min($lrgb[0] - $lrgb[2], $lrgb[0] - $lrgb[1]));
        $g = max(0, min($lrgb[1] - $lrgb[2], $lrgb[1] - $lrgb[0]));
        $b = max(0, min($lrgb[2] - $lrgb[1], $lrgb[2] - $lrgb[0]));

        return new ColorWeights($w, $c, $m, $y, $r, $g, $b);
    }
}
