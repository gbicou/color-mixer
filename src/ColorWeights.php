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
}
