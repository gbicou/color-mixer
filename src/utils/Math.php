<?php

namespace Bicou\utils;

class Math
{

    public static function lerp(float $a, float $b, float $alpha): float
    {
        return $a + $alpha * ($b - $a);
    }

    public static function dotproduct(array $a, array $b)
    {
        $p = 0;
        foreach (array_keys($a) as $i) {
            $p += $a[$i] * $b[$i];
        }
        return $p;
    }


    public static function concentration(float $l1, float $l2, float $t): float
    {
        $t1 = $l1 * (1 - $t) ** 2;
        $t2 = $l2 * $t ** 2;

        return $t2 / ($t1 + $t2);
    }
}
