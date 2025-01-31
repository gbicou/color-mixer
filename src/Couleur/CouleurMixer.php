<?php

namespace Bicou\ColorMixer\Couleur;

use Bicou\ColorMixer\ColorInterface;
use Bicou\ColorMixer\Mixer;
use Bicou\ColorMixer\MixerInterface;
use matthieumastadenis\couleur\ColorInterface as CouleurColorInterface;
use matthieumastadenis\couleur\colors\LinRgb;

/**
 * Color mixer adapter.
 *
 * @implements MixerInterface<CouleurColorInterface>
 */
class CouleurMixer implements MixerInterface
{
    /** @var MixerInterface<ColorInterface> inner linear rgb mixer */
    private MixerInterface $mixer;

    public function __construct(
        CouleurColorInterface $begin,
        CouleurColorInterface $end,
    ) {
        $this->mixer = new Mixer(new CouleurColor($begin), new CouleurColor($end));
    }

    public function at(float $ratio): CouleurColorInterface
    {
        $color = $this->mixer->at($ratio);

        return new LinRgb($color->getRed(), $color->getGreen(), $color->getBlue(), $color->getOpacity());
    }
}
