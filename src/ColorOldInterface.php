<?php

namespace Bicou;

interface ColorOldInterface
{
    public function getRed(): float;

    public function getGreen(): float;

    public function getBlue(): float;

    /**
     * @return array<float>
     */
    public function getLinearRGB(): array;
}