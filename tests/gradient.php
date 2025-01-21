<?php

require __DIR__ . '/../vendor/autoload.php';

use matthieumastadenis\couleur\ColorFactory;

$from = ColorFactory::newRgb('#ffff00');
$to   = ColorFactory::newRgb('#0000ff');

echo '<div>';

$mix = new \Bicou\Melange\Couleur\CouleurMix($from, $to);

for ($i = 0; $i < 1; $i+=0.10) {
    $m = $mix->atCouleur($i);

    echo '<div style="background: ',$m->toHexRgb(),'; padding: 10px; margin: 2px">';
    echo $m->toHexRgb(),' ',$m->toLinRgb();
    echo '</div>';
}

echo '</div>';
