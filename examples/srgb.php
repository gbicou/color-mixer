<?php

require __DIR__ . '/../vendor/autoload.php';

$from = new Bicou\ColorMixer\Color(1, 1, .1);
$to = new Bicou\ColorMixer\Color(0, .3, 1);

echo '<div>';

$mix = new Bicou\ColorMixer\Tests\BasicMixer($from, $to);

for ($i = 0; $i <= 1; $i += 0.2) {
    $m = $mix->at($i);

    [$red, $green, $blue] = Bicou\ColorMixer\SRGBConversions::LinearToSRGB($m->getRed(), $m->getGreen(), $m->getBlue());

    echo '<div style="background: color(srgb-linear ',$m->getRed(),' ',$m->getGreen(),' ',$m->getBlue(),'); padding: 10px; margin: 1px">';
    // echo $red,' ',$green,' ',$blue;
    // echo "<br />";
    echo $m->getRed(),' ',$m->getGreen(), ' ',$m->getBlue();
    echo '</div>';
}

echo '</div>';

$from_css = 'color(srgb-linear '.$from->getRed().' '.$from->getGreen().' '.$from->getBlue().')';
$to_css = 'color(srgb-linear '.$to->getRed().' '.$to->getGreen().' '.$to->getBlue().')';

echo '<div style="margin-top: 10px; height: 120px; padding: 10px; background: linear-gradient(',$from_css,',', $to_css,')">CSS gradient</div>';
