<?php

namespace Bicou\ColorMixer;

class ReflectanceBase implements ReflectanceInterface
{
    /** @var int size of components arrays */
    public const SIZE = 38;

    /**
     * @var float[]
     */
    private const CIE_CMF_X = [
        0.00006469, 0.00021941, 0.00112057, 0.00376661, 0.01188055, 0.02328644, 0.03455942, 0.03722379, 0.03241838, 0.02123321, 0.01049099, 0.00329584, 0.00050704, 0.00094867,
        0.00627372, 0.01686462, 0.02868965, 0.04267481, 0.05625475, 0.0694704,  0.08305315, 0.0861261,  0.09046614, 0.08500387, 0.07090667, 0.05062889, 0.03547396, 0.02146821,
        0.01251646, 0.00680458, 0.00346457, 0.00149761, 0.0007697,  0.00040737, 0.00016901, 0.00009522, 0.00004903, 0.00002,
    ];

    /**
     * @var float[]
     */
    private const CIE_CMF_Y = [
        0.00000184, 0.00000621, 0.00003101, 0.00010475, 0.00035364, 0.00095147, 0.00228226, 0.00420733, 0.0066888,  0.0098884,  0.01524945, 0.02141831, 0.03342293, 0.05131001,
        0.07040208, 0.08783871, 0.09424905, 0.09795667, 0.09415219, 0.08678102, 0.07885653, 0.0635267,  0.05374142, 0.04264606, 0.03161735, 0.02088521, 0.01386011, 0.00810264,
        0.0046301,  0.00249138, 0.0012593,  0.00054165, 0.00027795, 0.00014711, 0.00006103, 0.00003439, 0.00001771, 0.00000722,
    ];

    /**
     * @var float[]
     */
    private const CIE_CMF_Z = [
        0.00030502, 0.00103681, 0.00531314, 0.01795439, 0.05707758, 0.11365162, 0.17335873, 0.19620658, 0.18608237, 0.13995048, 0.08917453, 0.04789621, 0.02814563, 0.01613766,
        0.0077591,  0.00429615, 0.00200551, 0.00086147, 0.00036904, 0.00019143, 0.00014956, 0.00009231, 0.00006813, 0.00002883, 0.00001577, 0.00000394, 0.00000158, 0.0,
        0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0,
    ];

    /**
     * @var float[]
     */
    private const XYZ_R = [3.2409699419045226,  -1.537383177570094,   -0.4986107602930034];
    /**
     * @var float[]
     */
    private const XYZ_G = [-0.9692436362808796,   1.8759675015077202,   0.04155505740717559];
    /**
     * @var float[]
     */
    private const XYZ_B = [0.05563007969699366, -0.20397695888897652,  1.0569715142428786];

    /**
     * Base reflectance class.
     *
     * @param float[] $R reflectance data to initialize with
     */
    public function __construct(
        private array $R = [],
    ) {
    }

    public function getComponent(int $index): float
    {
        if (0 > $index || $index >= self::SIZE) {
            throw new \InvalidArgumentException('Index out of range');
        }

        return $this->R[$index];
    }

    public function setComponent(int $index, float $value): void
    {
        if (0 > $index || $index >= self::SIZE) {
            throw new \InvalidArgumentException('Index out of range');
        }

        $this->R[$index] = $value;
    }

    public function getX(): float
    {
        return Math::dot($this->R, self::CIE_CMF_X);
    }

    public function getY(): float
    {
        return Math::dot($this->R, self::CIE_CMF_Y);
    }

    public function getZ(): float
    {
        return Math::dot($this->R, self::CIE_CMF_Z);
    }

    public function toLinearRGB(): array
    {
        $xyz = [$this->getX(), $this->getY(), $this->getZ()];

        $r = Math::dot(self::XYZ_R, $xyz);
        $g = Math::dot(self::XYZ_G, $xyz);
        $b = Math::dot(self::XYZ_B, $xyz);

        return [$r, $g, $b];
    }
}
