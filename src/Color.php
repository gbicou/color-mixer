<?php

namespace Bicou\Melange;

abstract class Color implements ColorInterface
{
    /**
     * @return array<float>
     */
    public function getWeights(): array
    {
        $w = min($this->getRed(), $this->getGreen(), $this->getBlue());
        $lrgb = [$this->getRed() - $w, $this->getGreen() - $w, $this->getBlue() - $w];

        $c = min($lrgb[1], $lrgb[2]);
        $m = min($lrgb[0], $lrgb[2]);
        $y = min($lrgb[0], $lrgb[1]);
        $r = max(0, min($lrgb[0] - $lrgb[2], $lrgb[0] - $lrgb[1]));
        $g = max(0, min($lrgb[1] - $lrgb[2], $lrgb[1] - $lrgb[0]));
        $b = max(0, min($lrgb[2] - $lrgb[1], $lrgb[2] - $lrgb[0]));

        return [$w, $c, $m, $y, $r, $g, $b];
    }
}