<?php

namespace Bicou\Melange;

/**
 * A color in the linear RGB space
 */
interface ColorInterface
{
    public function getRed(): float;

    public function getGreen(): float;

    public function getBlue(): float;

    public function getOpacity(): float;

    /**
     * @return array<float>
     */
    public function getWeights(): array;
}
