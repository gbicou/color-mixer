<?php

require __DIR__ . '/../vendor/autoload.php';

use matthieumastadenis\couleur\ColorFactory;

$from = ColorFactory::newRgb('#FFCC66');
$to   = ColorFactory::newRgb('#0066ff');

echo '<div>';

for ($i = 0; $i < 1; $i+=0.05) {
    $m = \Bicou\Melange::mix($from, $to, $i);

    echo '<div style="background: ',$m->toHexRgb(),'; padding: 10px; margin: 2px">';
    echo $m->toHexRgb(),' ',$m->toLinRgb();
    echo '</div>';
}

echo '</div>';
