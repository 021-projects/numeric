<?php

namespace O21\Numeric;

use Brick\Math\BigNumber;

use function O21\Numeric\Helpers\to_bn;

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

    public function get(...$opts): string
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

    public function __toString(): string
    {
        return $this->get();
    }
}
