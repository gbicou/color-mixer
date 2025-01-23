<?php

namespace Bicou\ColorMixer;

class Mixer extends MixerBase
{
    public function __construct(
        ColorInterface $begin,
        ColorInterface $end,
    ) {
        $this->setBegin($begin)->setEnd($end);
    }
}
