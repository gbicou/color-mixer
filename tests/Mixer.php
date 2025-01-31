<?php

namespace Bicou\ColorMixer\Tests;

use Bicou\ColorMixer\ColorInterface;
use Bicou\ColorMixer\MixerBase;

class Mixer extends MixerBase
{
    public function __construct(
        ColorInterface $begin,
        ColorInterface $end,
    ) {
        $this->setBegin($begin)->setEnd($end);
    }
}
