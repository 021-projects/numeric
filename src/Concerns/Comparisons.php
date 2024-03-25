<?php

namespace O21\Numeric\Concerns;

use O21\Numeric\Numeric;

use function O21\Numeric\Helpers\num;

trait Comparisons
{
    public function equals(string|float|int|Numeric $value): bool
    {
        return bccomp((string) $this, (string) (new self($value)), $this->_scale) === 0;
    }

    public function greaterThan(string|float|int|Numeric $value): bool
    {
        return bccomp((string) $this, (string) (new self($value)), $this->_scale) === 1;
    }

    public function lessThan(string|float|int|Numeric $value): bool
    {
        return bccomp((string) $this, (string) (new self($value)), $this->_scale) === -1;
    }

    public function greaterThanOrEqual(string|float|int|Numeric $value): bool
    {
        return bccomp((string) $this, (string) (new self($value)), $this->_scale) >= 0;
    }

    public function lessThanOrEqual(string|float|int|Numeric $value): bool
    {
        return bccomp((string) $this, (string) (new self($value)), $this->_scale) <= 0;
    }

    /**
     * Get the minimum value of the given values
     *
     * @param  string|float|int|Numeric[]  ...$values
     */
    public function min(...$values): Numeric
    {
        $min = $this;
        foreach ($values as $value) {
            if (num($value)->lessThan($min)) {
                $min = $value;
            }
        }

        return new self($min);
    }

    /**
     * Get the maximum value of the given values
     *
     * @param  string|float|int|Numeric[]  ...$values
     */
    public function max(...$values): Numeric
    {
        $max = $this;
        foreach ($values as $value) {
            if (num($value)->greaterThan($max)) {
                $max = $value;
            }
        }

        return new self($max);
    }
}
