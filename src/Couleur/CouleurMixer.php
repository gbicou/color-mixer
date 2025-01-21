<?php

namespace Bicou\ColorMixer\Couleur;

use Bicou\ColorMixer\ColorInterface;
use Bicou\ColorMixer\MixerBase;
use matthieumastadenis\couleur\ColorInterface as CouleurColorInterface;
use matthieumastadenis\couleur\colors\LinRgb;

/**
 * Color mixer adapter
 */
class CouleurMixer extends MixerBase
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