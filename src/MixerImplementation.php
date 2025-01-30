<?php

namespace Bicou\ColorMixer;

/**
 * @template T
 */
interface MixerImplementation
{
    /**
     * @return T
     */
    public function mix(float $ratio): mixed;
}
