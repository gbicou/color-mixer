<?php

namespace Bicou\ColorMixer\Tests;

use Bicou\ColorMixer\Spatie\SpatieMixer;
use PHPUnit\Framework\TestCase;
use Spatie\Color\Hex;

class SpatieMixerTest extends TestCase
{
    public function testYellowAndBlueMakeGreen(): void
    {
        $yellow = Hex::fromString('#ffff00');
        $blue = Hex::fromString('#0000ff');
        $green = Hex::fromString('#388f54');

        $middle = (new SpatieMixer($yellow, $blue))->mix(0.5)->toHex();

        $this->assertEquals($green->red(), $middle->red());
        $this->assertEquals($green->green(), $middle->green());
        $this->assertEquals($green->blue(), $middle->blue());
    }

    public function testSameStartAndEnd(): void
    {
        $green = Hex::fromString('#388f54');
        $mixer = new SpatieMixer($green, $green);

        $middle = $mixer->mix(0.5)->toHex();

        $this->assertEquals($green->red(), $middle->red());
        $this->assertEquals($green->green(), $middle->green());
        $this->assertEquals($green->blue(), $middle->blue());
    }
}
