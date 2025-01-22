<?php

require __DIR__.'/../vendor/autoload.php';

use Bicou\ColorMixer\Couleur\CouleurMixer;
use matthieumastadenis\couleur\colors\HexRgb;

$from = new HexRgb('ff', 'cc', '00');
$to = new HexRgb('00', '66', 'cc');

echo '<div>';

$mix = new CouleurMixer($from, $to);

for ($i = 0; $i < 1; $i += 0.10) {
    $m = $mix->atCouleur($i);

    echo '<div style="background: ',$m->toHexRgb(),'; padding: 10px; margin: 2px">';
    echo $m->toHexRgb(),' ',$m->toLinRgb();
    echo '</div>';
}

echo '</div>';
