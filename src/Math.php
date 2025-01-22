<?php

namespace Bicou\ColorMixer;

class Math
{
    /**
     * linear interpolation.
     */
    public static function interpolate(float $a, float $b, float $alpha): float
    {
        if ($alpha < 0 || $alpha > 1) {
            throw new \InvalidArgumentException('alpha must be between 0 and 1');
        }

        return $a + $alpha * ($b - $a);
    }

    /**
     * dot product.
     *
     * @param float[] $a
     * @param float[] $b
     */
    public static function dot(array $a, array $b): float
    {
        $p = 0;
        foreach (array_keys($a) as $i) {
            $p += $a[$i] * $b[$i];
        }

        return $p;
    }

    /**
     * quadratic concentration.
     */
    public static function concentration(float $l1, float $l2, float $t): float
    {
        if ($t < 0 || $t > 1) {
            throw new \InvalidArgumentException('t must be between 0 and 1');
        }

        $t1 = $l1 * (1 - $t) ** 2;
        $t2 = $l2 * $t ** 2;

        return $t1 + $t2 ? ($t2 / ($t1 + $t2)) : 0;
    }
}
