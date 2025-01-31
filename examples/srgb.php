<?php

require __DIR__ . '/../vendor/autoload.php';

use Bicou\ColorMixer\Mixer;
use Bicou\ColorMixer\Color;
use Bicou\ColorMixer\SRGBConversions;
use Bicou\ColorMixer\ColorInterface;

function colorToCSS(ColorInterface $color): string
{
    [$red, $green, $blue] = SRGBConversions::LinearToSRGB($color->getRed(), $color->getGreen(), $color->getBlue());

    return 'color(srgb '.round($red / 255, 5).' '.round($green / 255, 5).' '.round($blue / 255, 5).')';
}

$from = new Color(1, 1, .1);
$to = new Color(0, .3, 1);

echo '<div>';

$mix = new Mixer($from, $to);

foreach ($mix->iterate(3) as $m) {
    $background = colorToCSS($m);

    echo '<div style="background: ',$background,'; padding: 10px; margin: 1px">';
    echo $background;
    echo '</div>';
}

echo '</div>';

$from_css = colorToCSS($from);
$to_css =  colorToCSS($to);

echo '<div style="margin-top: 10px; height: 120px; padding: 10px; background: linear-gradient(',$from_css,',', $to_css,')">CSS gradient</div>';
