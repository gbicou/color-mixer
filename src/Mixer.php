<?php

namespace Bicou\ColorMixer;

/**
 * Color mixer in the linear RGB space.
 *
 * @implements MixerInterface<ColorInterface>
 */
class Mixer implements MixerInterface
{
    private ReflectanceInterface $beginReflectance;
    private ReflectanceInterface $endReflectance;

    public function __construct(
        private readonly ColorInterface $begin,
        private readonly ColorInterface $end,
    ) {
        $this->beginReflectance = new Reflectance($begin);
        $this->endReflectance = new Reflectance($end);
    }

    final public function at(float $ratio): ColorInterface
    {
        $R1 = $this->beginReflectance;
        $R2 = $this->endReflectance;

        $l1 = $R1->getY();
        $l2 = $R2->getY();

        $t = Math::concentration($l1, $l2, $ratio);

        $R = new ReflectanceBase();
        for ($i = 0; $i < ReflectanceBase::SIZE; ++$i) {
            $KS = (1 - $t) * ((1 - $R1->getComponent($i)) ** 2 / (2 * $R1->getComponent($i))) + $t * ((1 - $R2->getComponent($i)) ** 2 / (2 * $R2->getComponent($i)));
            $KM = 1 + $KS - sqrt($KS ** 2 + 2 * $KS);

            // Saunderson correction
            // let S = ((1.0 - K1) * (1.0 - K2) * KM) / (1.0 - K2 * KM);

            $R->setComponent($i, $KM);
        }

        [$red, $green, $blue] = $R->toLinearRGB();

        $opacity = Math::interpolate(
            $this->begin->getOpacity(),
            $this->end->getOpacity(),
            $t
        );

        return new Color($red, $green, $blue, $opacity);
    }
}
