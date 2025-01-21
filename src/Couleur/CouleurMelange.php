<?php

namespace Bicou\Melange\Couleur;

use Bicou\Melange\Melange;
use matthieumastadenis\couleur\ColorInterface;
use matthieumastadenis\couleur\colors\LinRgb;

class CouleurMelange
{
    public static function mix(ColorInterface $color1, ColorInterface $color2, float $ratio): ColorInterface
    {
        $c = Melange::mix(new CouleurColor($color1), new CouleurColor($color2), $ratio);

        return new LinRgb($c->getRed(), $c->getGreen(), $c->getBlue(), $c->getOpacity());
    }
}