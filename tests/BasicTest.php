<?php

use Bicou\ColorMixer\Color;
use Bicou\ColorMixer\Mixer;
use PHPUnit\Framework\TestCase;

class BasicTest extends TestCase
{
    public function testOpacity()
    {
        $start = new Color(1,1,1,0);
        $end = new Color(1,1,1,1);

        $middle = (new Mixer($start, $end))->at(0.5);

        $this->assertEquals(0.5, $middle->getOpacity());
    }

    public function testGray()
    {
        $start = new Color(0,0,0,1);
        $end = new Color(1,1,1,1);

        $middle = (new Mixer($start, $end))->at(0.5);

        $grey = 0.381780769;
        $delta = 0.001;

        $this->assertEqualsWithDelta($grey, $middle->getRed(), $delta);
        $this->assertEqualsWithDelta($grey, $middle->getGreen(), $delta);
        $this->assertEqualsWithDelta($grey, $middle->getBlue(), $delta);
    }
}
