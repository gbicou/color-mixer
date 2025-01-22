<?php

namespace Bicou\ColorMixer\Tests;

use Bicou\ColorMixer\Math;
use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{

    public function testConcentration()
    {
        $this->assertEqualsWithDelta(0, Math::concentration(0, 1, 0), 0.00001);
        $this->assertEqualsWithDelta(1, Math::concentration(0, 1, 1), 0.00001);
        $this->assertEqualsWithDelta(1, Math::concentration(0, 10, 1), 0.00001);
        $this->assertEqualsWithDelta(1, Math::concentration(0, 10, 0.5), 0.00001);
        $this->assertEqualsWithDelta(1, Math::concentration(0, 1, 0.5), 0.00001);
    }

    public function testConcentrationException()
    {
        $this->expectException(\InvalidArgumentException::class);
        Math::concentration(0, 1, 2);
    }

    public function testDot()
    {
        $this->assertEqualsWithDelta(32, Math::dot([1, 2, 3], [4, 5, 6]), 0.00001);
        $this->assertEqualsWithDelta(0.32, Math::dot([0.1, 0.2, 0.3], [0.4, 0.5, 0.6]), 0.00001);
        $this->assertEqualsWithDelta(0.6, Math::dot([1, 2, 3], [0.1, 0.1, 0.1]), 0.00001);
    }

    public function testInterpolate()
    {
        $this->assertEquals(0, Math::interpolate(0, 1, 0));
        $this->assertEquals(1, Math::interpolate(0, 1, 1));

        $this->assertEquals(0, Math::interpolate(0, 10, 0));
        $this->assertEquals(10, Math::interpolate(0, 10, 1));

        $this->assertEquals(5, Math::interpolate(0, 10, 0.5));
        $this->assertEquals(15, Math::interpolate(10, 20, 0.5));
    }

    public function testInterpolateException()
    {
        $this->expectException(\InvalidArgumentException::class);
        Math::interpolate(0, 1, 2);
    }
}
