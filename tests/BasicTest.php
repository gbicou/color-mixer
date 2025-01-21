<?php

use Bicou\ColorMixer\ColorData;
use Bicou\ColorMixer\MixerData;
use PHPUnit\Framework\TestCase;

class BasicTest extends TestCase
{
    public function testOpacity()
    {
        $start = new ColorData(1,1,1,0);
        $end = new ColorData(1,1,1,1);

        $middle = (new MixerData($start, $end))->at(0.5);

        $this->assertEquals(0.5, $middle->getOpacity());
    }
}
