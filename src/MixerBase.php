<?php

namespace Bicou\ColorMixer;

abstract class MixerBase implements MixerInterface
{
    private ColorInterface $begin;

    private ReflectanceInterface $beginReflectance;

    public function setBegin(ColorInterface $color): static
    {
        $this->begin = $color;
        $this->beginReflectance = new Reflectance($color);

        return $this;
    }

    private ColorInterface $end;

    private ReflectanceInterface $endReflectance;

    public function setEnd(ColorInterface $color): static
    {
        $this->end = $color;
        $this->endReflectance = new Reflectance($color);

        return $this;
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
