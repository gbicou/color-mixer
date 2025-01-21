<?php

namespace Bicou\ColorMixer;

class Mixer extends MixerBase
{
    public function __construct(
        private readonly ColorInterface $begin,
        private readonly ColorInterface $end
    )
    {
    }

    /**
     * @inheritDoc
     */
    public function getBegin(): ColorInterface
    {
        return $this->begin;
    }

    /**
     * @inheritDoc
     */
    public function getEnd(): ColorInterface
    {
        return $this->end;
    }
}