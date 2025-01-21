<?php

namespace Bicou;

use Bicou\utils\Math;
use matthieumastadenis\couleur\ColorFactory;
use matthieumastadenis\couleur\ColorInterface;
use matthieumastadenis\couleur\ColorSpace;

class Melange implements MelangeInterface
{

    public static function mix(ColorInterface $color1, ColorInterface $color2, float $ratio): ColorInterface
    {
        $R1 = Reflectance::reflectance($color1);
        $R2 = Reflectance::reflectance($color2);

        $l1 = Math::dotproduct($R1, Reflectance::CIE_CMF_Y);
        $l2 = Math::dotproduct($R2, Reflectance::CIE_CMF_Y);

        $t = Math::concentration($l1, $l2, $ratio);

        $R = [];

        for ($i = 0; $i < Reflectance::SIZE; $i++) {
            $KS = (1 - $t) * ((1 - $R1[$i]) ** 2 / (2 * $R1[$i])) + $t * ((1 - $R2[$i]) ** 2 / (2 * $R2[$i]));
            $KM = 1 + $KS - sqrt($KS ** 2 + 2 * $KS);

            //Saunderson correction
            // let S = ((1.0 - K1) * (1.0 - K2) * KM) / (1.0 - K2 * KM);

            $R[$i] = $KM;
        }

        $rgb = Reflectance::reflectance_to_linear($R);
        return ColorFactory::newRgb($rgb, ColorSpace::LinRgb)->change(
            opacity: Math::lerp($color1->opacity, $color2->opacity, $t)
        );
    }
}
