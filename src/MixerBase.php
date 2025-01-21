<?php

namespace Bicou\ColorMixer;

abstract class MixerBase implements MixerInterface
{
    final public function at(float $ratio): ColorInterface
    {
        $R1 = new Reflectance($this->getBegin());
        $R2 = new Reflectance($this->getEnd());

        $l1 = $R1->getY();
        $l2 = $R2->getY();

        $t = Math::concentration($l1, $l2, $ratio);

        $R = new Reflectance();
        for ($i = 0; $i < Reflectance::SIZE; $i++) {
            $KS = (1 - $t) * ((1 - $R1->getComponent($i)) ** 2 / (2 * $R1->getComponent($i))) + $t * ((1 - $R2->getComponent($i)) ** 2 / (2 * $R2->getComponent($i)));
            $KM = 1 + $KS - sqrt($KS ** 2 + 2 * $KS);

            // Saunderson correction
            // let S = ((1.0 - K1) * (1.0 - K2) * KM) / (1.0 - K2 * KM);

            $R->setComponent($i, $KM);
        }

        [$red, $green, $blue] = $R->toLinearRGB();

        $opacity = Math::interpolate(
            $this->getBegin()->getOpacity(),
            $this->getEnd()->getOpacity(),
            $t
        );

        return new Color($red, $green, $blue, $opacity);
    }
}
