<?php
require __DIR__ . '/../vendor/autoload.php';

use matthieumastadenis\couleur\colors\HexRgb;
use Bicou\ColorMixer\Couleur\CouleurMixer;

$yellow = new HexRgb('F2', 'DE', '24');
$blue = new HexRgb('3F', '58', 'FC');

$mixer = new CouleurMixer($yellow, $blue);

foreach ($mixer->iterate(3) as $step) {
    echo $step->toHexRgb(), "\n";
}
