<?php

namespace Bicou\ColorMixer\Tests;

use Bicou\ColorMixer\ColorInterface;
use Bicou\ColorMixer\MixerBase;

class BasicMixer extends MixerBase
{
    public function __construct(
        ColorInterface $begin,
        ColorInterface $end,
    ) {
        $this->setBegin($begin)->setEnd($end);
    }
}
