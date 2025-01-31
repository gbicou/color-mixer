<?php

namespace Bicou\ColorMixer\Couleur;

use Bicou\ColorMixer\MixerBase;
use Bicou\ColorMixer\MixerImplementation;
use matthieumastadenis\couleur\ColorInterface as CouleurColorInterface;
use matthieumastadenis\couleur\colors\LinRgb;

/**
 * Color mixer adapter.
 *
 * @implements MixerImplementation<CouleurColorInterface>
 */
class CouleurMixer extends MixerBase implements MixerImplementation
{
    public function __construct(
        CouleurColorInterface $begin,
        CouleurColorInterface $end,
    ) {
        $this->setBegin(new CouleurColor($begin))->setEnd(new CouleurColor($end));
    }

    public function mix(float $ratio): CouleurColorInterface
    {
        $color = $this->at($ratio);

        return new LinRgb($color->getRed(), $color->getGreen(), $color->getBlue(), $color->getOpacity());
    }
}
