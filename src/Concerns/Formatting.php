<?php

namespace O21\Numeric\Concerns;

trait Formatting
{
    public function format(
        int $decimals = 8,
        string $decimalSeparator = '.',
        string $thousandsSeparator = '',
        mixed $value = null
    ): string {
        $value ??= $this->_dirtyValue;

        return number_format(
            (float) $value,
            $decimals,
            $decimalSeparator,
            $thousandsSeparator
        );
    }

    protected function trimTrailingZero(string $value): string
    {
        return str_contains($value, '.')
            ? rtrim(rtrim($value, '0'), '.')
            : $value;
    }

    public function positive(): string
    {
        return $this->trimTrailingZero($this->format(
            decimals: $this->_scale,
            value: abs($this->_dirtyValue)
        ));
    }

    public function negative(): string
    {
        return $this->trimTrailingZero($this->format(
            decimals: $this->_scale,
            value: -abs($this->_dirtyValue)
        ));
    }

    public function digits(): string
    {
        return explode('.', $this->get())[1] ?? '';
    }
}
