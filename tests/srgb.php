<?php

require __DIR__.'/../vendor/autoload.php';

$from = new Bicou\ColorMixer\Color(1, 1, .1);
$to = new Bicou\ColorMixer\Color(.1, .1, 1);

echo '<div>';

$mix = new Bicou\ColorMixer\Mixer($from, $to);

for ($i = 0; $i <= 1; $i += 0.2) {
    $m = $mix->at($i);

    [$red, $green, $blue] = Bicou\ColorMixer\SRGBConversions::LinearToSRGB($m->getRed(), $m->getGreen(), $m->getBlue());

    echo '<div style="background: color(srgb-linear ',$m->getRed(),' ',$m->getGreen(),' ',$m->getBlue(),'); padding: 10px; margin: 2px">';
    // echo $red,' ',$green,' ',$blue;
    // echo "<br />";
    echo $m->getRed(),' ',$m->getGreen(), ' ',$m->getBlue();
    echo '</div>';
}

echo '</div>';
