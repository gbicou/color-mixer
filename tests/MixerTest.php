<?php
namespace Bicou\ColorMixer\Tests;

use Bicou\ColorMixer\Couleur\CouleurMixer;
use matthieumastadenis\couleur\colors\HexRgb;
use PHPUnit\Framework\TestCase;

class MixerTest extends TestCase
{
    public function testYellowAndBlueMakeGreen(): void
    {
        $yellow = new HexRgb('ff', 'ff', '00');
        $blue   = new HexRgb('00', '00', 'ff');
        $green  = new HexRgb('38', '8F', '54');

        $middle = (new CouleurMixer($yellow, $blue))->atCouleur(0.5);

        $this->assertEquals($green->coordinates(), $middle->toHexRgb()->coordinates());
    }
}
