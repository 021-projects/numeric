<?php

namespace O21\Numeric;

use Brick\Math\BigNumber;

use function O21\Numeric\Helpers\to_bn;
use function O21\Numeric\Helpers\num;

class Numeric
{
    use Concerns\Calculations;
    use Concerns\Comparisons;
    use Concerns\Formatting;

    public BigNumber $bn;

    public function __construct(
        string|float|int|Numeric|BigNumber $value,
    ) {
        $this->bn = to_bn($value);
    }

    /**
     * @deprecated Use str() instead
     * @param ...$opts
     * @return string
     */
    public function get(...$opts): string
    {
        return $this->str(...$opts);
    }

    public function str(...$opts): string
    {
        $raw = $opts['raw'] ?? false;

        $value = $this->bn;

        if (! $raw
            && method_exists($value, 'stripTrailingZeros')
        ) {
            $value = $value->stripTrailingZeros();
        }

        return $value->jsonSerialize();
    }

    public function clone(): self
    {
        return num($this->bn);
    }

    public function __toString(): string
    {
        return $this->str();
    }
}
