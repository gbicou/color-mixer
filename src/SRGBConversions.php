<?php

namespace Bicou\ColorMixer;

/**
 * SRGBColor <-> linear RGB color conversion.
 */
class SRGBConversions
{
    private const GAMMA = 2.4;

    private static function srgb_to_linear_component(float $x): float
    {
        return ($x < 0.04045) ? $x / 12.92 : pow(($x + 0.055) / 1.055, self::GAMMA);
    }

    public static function linear_to_srgb_component(float $x): float
    {
        return ($x < 0.0031308) ? $x * 12.92 : 1.055 * pow($x, 1.0 / self::GAMMA) - 0.055;
    }

    /**
     * Translate the color from the sRGB color space to the linear RGB color space.
     *
     * @param float $red   sRGB red component (0.0 - 255.0)
     * @param float $green sRGB green component (0.0 - 255.0)
     * @param float $blue  sRGB blue component (0.0 - 255.0)
     *
     * @return float[] [red, green, blue]
     */
    public static function SRGBToLinear(float $red, float $green, float $blue): array
    {
        return [
            Math::clamp(self::srgb_to_linear_component($red / 255), 0, 1),
            Math::clamp(self::srgb_to_linear_component($green / 255), 0, 1),
            Math::clamp(self::srgb_to_linear_component($blue / 255), 0, 1),
        ];
    }

    /**
     * Translate the color from the linear RGB color space to the sRGB color space.
     *
     * @param float $red   linear red component (0.0 - 1.0)
     * @param float $green linear green component (0.0 - 1.0)
     * @param float $blue  linear blue component (0.0 - 1.0)
     *
     * @return float[] [red, green, blue]
     */
    public static function LinearToSRGB(float $red, float $green, float $blue): array
    {
        return [
            Math::clamp(self::linear_to_srgb_component($red) * 255, 0, 255),
            Math::clamp(self::linear_to_srgb_component($green) * 255, 0, 255),
            Math::clamp(self::linear_to_srgb_component($blue) * 255, 0, 255),
        ];
    }
}
