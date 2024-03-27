<?php

namespace O21\Numeric\Helpers;

use Brick\Math\BigDecimal;
use Brick\Math\BigNumber;
use O21\Numeric\Numeric;

if (! function_exists('num')) {
    /**
     * Create a new Numeric instance for safe calculations
     */
    function num(
        string|float|int|Numeric|BigNumber $value,
        ?int $scale = null
    ): Numeric {
        $num = new Numeric(to_bn($value));

        if ($scale !== null) {
            $num->scale($scale);
        }

        return $num;
    }
}

if (! function_exists('to_bn')) {
    function to_bn(string|float|int|Numeric|BigNumber $value): BigNumber
    {
        if ($value instanceof BigNumber) {
            return $value;
        }

        if ($value instanceof Numeric) {
            return BigDecimal::of($value->bn);
        }

        return BigDecimal::of($value);
    }
}

if (! function_exists('num_min')) {
    function num_min(string|float|int|Numeric|BigNumber ...$values): Numeric
    {
        $min = $values[0];
        foreach ($values as $value) {
            if (to_bn($value)->isLessThan($min)) {
                $min = $value;
            }
        }

        return num($min);
    }
}

if (! function_exists('num_max')) {
    function num_max(string|float|int|Numeric|BigNumber ...$values): Numeric
    {
        $max = $values[0];
        foreach ($values as $value) {
            if (to_bn($value)->isGreaterThan($max)) {
                $max = $value;
            }
        }

        return num($max);
    }
}
