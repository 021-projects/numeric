<?php

use O21\Numeric\Numeric;

if (! function_exists('num')) {
    /**
     * Create a new Numeric instance for safe calculations
     */
    function num(string|float|int|Numeric $value, ?int $scale = null): Numeric
    {
        return new O21\Numeric\Numeric($value, $scale);
    }
}
