<?php

namespace O21\Numeric;

use O21\Numeric\Exceptions\MaxValueLimitedException;

class Numeric
{
    use Concerns\Calculations;
    use Concerns\Comparisons;
    use Concerns\Formatting;

    /*
     * For some reason, after 22 digits, the scale is not formatted correctly
     * 0.00000025 will be formatted as 0.00000024999999999999999 if the scale is 23
     */
    private const MAX_SCALE_CAPTURE = 22;

    /**
     * number_format('1000000000.123456789', 8, '.', '') = 1000000000.12345684
     */
    private const MAX_VALUE = 99_999_999;

    private const DEFAULT_SCALE = 8;

    protected string $_dirtyValue;

    protected int $_scale;

    public function __construct(
        string|float|int|Numeric $value,
        ?int $scale = null
    ) {
        $scale ??= $this->detectScale($value);
        $this->_dirtyValue = $value instanceof self
            ? (string) $value
            : $this->format(
                decimals: $scale,
                value: $value
            );
        $this->_scale = $scale;

        if ((int)(string) $value > self::MAX_VALUE) {
            throw new MaxValueLimitedException;
        }
    }

    public function get(): string
    {
        return $this->trimTrailingZero($this->format($this->_scale));
    }

    public function __toString(): string
    {
        return $this->get();
    }

    public function scale(?int $scale = null): self|int
    {
        if (is_null($scale)) {
            return $this->_scale;
        }

        $this->_scale = $scale;

        return $this;
    }

    protected function detectScale(string|float|int|Numeric $value): int
    {
        return match (true) {
            is_int($value) => self::DEFAULT_SCALE,
            is_string($value) || is_float($value) => (function () use ($value) {
                $num = new self($value, self::MAX_SCALE_CAPTURE);

                return strlen(rtrim($num->digits(), '0'));
            })(),
            default => $value->scale(),
        };
    }
}
