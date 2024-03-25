<?php

namespace O21\Numeric\Concerns;

use Brick\Math\BigNumber;
use O21\Numeric\Numeric;

use function O21\Numeric\Helpers\to_bn;

trait Comparisons
{
    public function equals(string|float|int|Numeric|BigNumber $value): bool
    {
        return $this->bn->isEqualTo(to_bn($value));
    }

    public function greaterThan(string|float|int|Numeric $value): bool
    {
        return $this->bn->isGreaterThan(to_bn($value));
    }

    public function lessThan(string|float|int|Numeric $value): bool
    {
        return $this->bn->isLessThan(to_bn($value));
    }

    public function greaterThanOrEqual(string|float|int|Numeric $value): bool
    {
        return $this->bn->isGreaterThanOrEqualTo(to_bn($value));
    }

    public function lessThanOrEqual(string|float|int|Numeric $value): bool
    {
        return $this->bn->isLessThanOrEqualTo(to_bn($value));
    }
}
