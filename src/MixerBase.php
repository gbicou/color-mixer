<?php

namespace Bicou\ColorMixer;

/**
 * @template T
 * @implements MixerInterface<T>
 */
abstract class MixerBase implements MixerInterface
{
    public function iterate(int $stops): iterable
    {
        if ($stops < 1) {
            throw new \InvalidArgumentException('stops must be at least 1');
        }
        $bound = $stops + 1;
        for ($i = 0; $i <= $bound; $i++) {
            yield $this->at($i / $bound);
        }
    }

}
