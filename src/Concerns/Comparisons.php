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

    public function eq(string|float|int|Numeric|BigNumber $value): bool
    {
        return $this->equals($value);
    }

    public function greaterThan(string|float|int|Numeric $value): bool
    {
        return $this->bn->isGreaterThan(to_bn($value));
    }

    public function gt(string|float|int|Numeric $value): bool
    {
        return $this->greaterThan($value);
    }

    public function lessThan(string|float|int|Numeric $value): bool
    {
        return $this->bn->isLessThan(to_bn($value));
    }

    public function lt(string|float|int|Numeric $value): bool
    {
        return $this->lessThan($value);
    }

    public function greaterThanOrEqual(string|float|int|Numeric $value): bool
    {
        return $this->bn->isGreaterThanOrEqualTo(to_bn($value));
    }

    public function gte(string|float|int|Numeric $value): bool
    {
        return $this->greaterThanOrEqual($value);
    }

    public function lessThanOrEqual(string|float|int|Numeric $value): bool
    {
        return $this->bn->isLessThanOrEqualTo(to_bn($value));
    }

    public function lte(string|float|int|Numeric $value): bool
    {
        return $this->lessThanOrEqual($value);
    }
}
