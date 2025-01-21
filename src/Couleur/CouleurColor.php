<?php

namespace Bicou\ColorMixer\Couleur;

use Bicou\ColorMixer\Color;

use matthieumastadenis\couleur\ColorInterface as CouleurColorInterface;

/**
 * Color adapter
 */
class CouleurColor extends Color
{
    private CouleurColorInterface $linear;
    public function __construct(
        CouleurColorInterface $color
    ) {
        $this->linear = $color->toLinRgb();
    }

    public function getRed(): float
    {
        return $this->linear->red;
    }

    public function getGreen(): float
    {
        return $this->linear->green;
    }

    public function getBlue(): float
    {
        return $this->linear->blue;
    }

    public function getOpacity(): float
    {
        return $this->linear->opacity;
    }
}
