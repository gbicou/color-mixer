<?php

require __DIR__ . '/../vendor/autoload.php';

use Bicou\ColorMixer\Couleur\CouleurMixer;
use matthieumastadenis\couleur\colors\HexRgb;

$from = new HexRgb('ff', 'ee', '99');
$to = new HexRgb('33', '66', 'ff');

echo '<div>';

$mixer = new CouleurMixer($from, $to);

foreach ($mixer->iterate(5) as $m) {
    echo '<div style="background: ',$m->toHexRgb(),'; padding: 10px; margin: 1px">';
    echo $m->toHexRgb(),' ',$m->toLinRgb();
    echo '</div>';
}

echo '</div>';

$from_css = $from->toHexRgb()->__toString();
$to_css = $to->toHexRgb()->__toString();

echo '<div style="margin-top: 10px; height: 120px; padding: 10px; background: linear-gradient(',$from_css,',', $to_css,')">CSS gradient</div>';
