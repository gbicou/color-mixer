<?php

namespace Bicou\Melange\Couleur;

use Bicou\Melange\ColorInterface;
use Bicou\Melange\Mix;
use matthieumastadenis\couleur\ColorInterface as CouleurColorInterface;
use matthieumastadenis\couleur\colors\LinRgb;

/**
 * Color mix adapter
 */
class CouleurMix extends Mix
{
    private ColorInterface $begin;

    private ColorInterface $end;

    public function __construct(
        CouleurColorInterface $begin,
        CouleurColorInterface $end
    ) {
        $this->begin = new CouleurColor($begin);
        $this->end = new CouleurColor($end);
    }

    public function getBegin(): ColorInterface
    {
        return $this->begin;
    }

    public function getEnd(): ColorInterface
    {
        return $this->end;
    }

    public function atCouleur(float $ratio): CouleurColorInterface
    {
        $color = $this->at($ratio);

        return new LinRgb($color->getRed(), $color->getGreen(), $color->getBlue(), $color->getOpacity());
    }
}