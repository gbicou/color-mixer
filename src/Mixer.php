<?php

namespace Bicou\ColorMixer;

class Mixer extends MixerBase
{
    public function __construct(
        private readonly ColorInterface $begin,
        private readonly ColorInterface $end,
    ) {
    }

    public function getBegin(): ColorInterface
    {
        return $this->begin;
    }

    public function getEnd(): ColorInterface
    {
        return $this->end;
    }
}
