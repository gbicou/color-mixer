<?php
namespace Bicou\ColorMixer\Tests;

use Bicou\ColorMixer\Couleur\CouleurMixer;
use matthieumastadenis\couleur\ColorFactory;
use PHPUnit\Framework\TestCase;

class MixerTest extends TestCase
{
    public function testYellowAndBlueMakeGreen(): void
    {
        $yellow = ColorFactory::newRgb('#ffff00');
        $blue = ColorFactory::newRgb('#0000ff');
        $green = ColorFactory::newRgb('#388F54');

        $middle = (new CouleurMixer($yellow, $blue))->atCouleur(0.5);

        $this->assertEquals($green->toHexRgb()->coordinates(), $middle->toHexRgb()->coordinates());
    }
}
