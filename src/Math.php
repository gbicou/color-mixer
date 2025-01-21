<?php

namespace Bicou\ColorMixer;

class Math
{

    /**
     * linear interpolation
     *
     * @param float $a
     * @param float $b
     * @param float $alpha
     * @return float
     */
    public static function interpolate(float $a, float $b, float $alpha): float
    {
        return $a + $alpha * ($b - $a);
    }

    /**
     * dot product
     *
     * @param float[] $a
     * @param float[] $b
     * @return float
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
     * quadratic concentration
     *
     * @param float $l1
     * @param float $l2
     * @param float $t
     * @return float
     */
    public static function concentration(float $l1, float $l2, float $t): float
    {
        $t1 = $l1 * (1 - $t) ** 2;
        $t2 = $l2 * $t ** 2;

        return $t2 / ($t1 + $t2);
    }
}
