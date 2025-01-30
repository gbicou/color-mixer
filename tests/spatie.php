<?php

require __DIR__.'/../vendor/autoload.php';

use Bicou\ColorMixer\Spatie\SpatieMixer;
use Spatie\Color\Hex;

$from = new Hex('ff', 'ee', '99');
$to = new Hex('33', '66', 'ff');

echo '<div>';

$mixer = new SpatieMixer($from, $to);

for ($i = 0; $i <= 1; $i += 0.2) {
    $m = $mixer->mix($i);

    echo '<div style="background: ',$m->toHex(),'; padding: 10px; margin: 1px">';
    echo $m->toHex(),' ',$m->toRgb();
    echo '</div>';
}

echo '</div>';

$from_css = $from->toHex()->__toString();
$to_css = $to->toHex()->__toString();

echo '<div style="margin-top: 10px; height: 120px; padding: 10px; background: linear-gradient(',$from_css,',', $to_css,')">CSS gradient</div>';
