<?php

namespace Bicou\ColorMixer\Couleur;

use Bicou\ColorMixer\Mixer;
use Bicou\ColorMixer\MixerImplementation;
use matthieumastadenis\couleur\ColorInterface as CouleurColorInterface;
use matthieumastadenis\couleur\colors\LinRgb;

/**
 * Color mixer adapter.
 *
 * @implements MixerImplementation<CouleurColorInterface>
 */
class CouleurMixer extends Mixer implements MixerImplementation
{
    public function __construct(
        CouleurColorInterface $begin,
        CouleurColorInterface $end,
    ) {
        parent::__construct(new CouleurColor($begin), new CouleurColor($end));
    }

    public function mix(float $ratio): CouleurColorInterface
    {
        $color = $this->at($ratio);

        return new LinRgb($color->getRed(), $color->getGreen(), $color->getBlue(), $color->getOpacity());
    }
}
