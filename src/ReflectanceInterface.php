<?php

namespace Bicou\ColorMixer;

interface ReflectanceInterface
{
    public function getComponent(int $index): float;

    public function setComponent(int $index, float $value): void;

    public function getX(): float;

    public function getY(): float;

    public function getZ(): float;

    /**
     * Return the linear RGB values of the color represented by this reflectance.
     *
     * @return float[] linear RGB components
     */
    public function toLinearRGB(): array;
}
