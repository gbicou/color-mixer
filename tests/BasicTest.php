<?php
namespace Bicou\ColorMixer\Tests;

use Bicou\ColorMixer\Color;
use Bicou\ColorMixer\Mixer;
use PHPUnit\Framework\TestCase;

class BasicTest extends TestCase
{
    private const DELTA = 0.001;

    public function testOpacity(): void
    {
        $start = new Color(1, 1, 1, 0);
        $end = new Color(1, 1, 1, 1);

        $middle = (new Mixer($start, $end))->at(0.5);

        $this->assertEquals(0.5, $middle->getOpacity());
    }

    public function testGray(): void
    {
        $start = new Color(0, 0, 0, 1);
        $end = new Color(1, 1, 1, 1);

        $middle = (new Mixer($start, $end))->at(0.5);

        $grey = 0.381780769;

        $this->assertEqualsWithDelta($grey, $middle->getRed(), self::DELTA);
        $this->assertEqualsWithDelta($grey, $middle->getGreen(), self::DELTA);
        $this->assertEqualsWithDelta($grey, $middle->getBlue(), self::DELTA);
    }

    public function testRatioOverflow(): void
    {
        $start = new Color(1, 1, 1, 0);
        $end = new Color(1, 1, 1, 1);
        $mixer = new Mixer($start, $end);

        $this->expectException(\InvalidArgumentException::class);
        $mixer->at(1.5);
    }

    public function testStart0Stop1(): void
    {
        $start = new Color(0, 0, 0, 0);
        $stop = new Color(1, 1, 1, 1);

        $mixer = new Mixer($start, $stop);

        $begin = $mixer->at(0);
        $this->assertEqualsWithDelta($begin, $start, self::DELTA);

        $end = $mixer->at(1);
        $this->assertEqualsWithDelta($end, $stop, self::DELTA);
    }

    public function testIterator(): void
    {
        $start = new Color(0, 0, 0, 0);
        $stop = new Color(1, 1, 1, 1);

        $mixer = new Mixer($start, $stop);

        $middle = $mixer->at(0.5);

        $steps = iterator_to_array($mixer->iterate(1));

        $this->assertEqualsWithDelta($start, $steps[0], self::DELTA);
        $this->assertEqualsWithDelta($middle, $steps[1], self::DELTA);
        $this->assertEqualsWithDelta($stop, $steps[2], self::DELTA);
    }

    public function testIteratorCount(): void
    {
        $start = new Color(0, 0, 0, 0);
        $stop = new Color(1, 1, 1, 1);

        $mixer = new Mixer($start, $stop);

        $this->assertEquals(3, iterator_count($mixer->iterate(1)));
        $this->assertEquals(5, iterator_count($mixer->iterate(3)));
    }
}
