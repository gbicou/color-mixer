<?php

namespace Bicou\ColorMixer\Couleur;

use Bicou\ColorMixer\Color;

use matthieumastadenis\couleur\ColorInterface as CouleurColorInterface;

/**
 * Color adapter
 */
class CouleurColor extends Color
{
    public function __construct(
        CouleurColorInterface $color
    ) {
        $linear = $color->toLinRgb();

        parent::__construct($linear->red, $linear->green, $linear->blue, $linear->opacity);
    }
}
