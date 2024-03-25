<?php

namespace O21\Numeric\Concerns;

use Brick\Math\BigNumber;
use Brick\Math\RoundingMode;
use O21\Numeric\Numeric;

use function O21\Numeric\Helpers\to_bn;

trait Calculations
{
    public function add(string|float|int|Numeric|BigNumber $value): self
    {
        $this->bn = $this->bn->plus(to_bn($value));

        return $this;
    }

    public function sub(string|float|int|Numeric|BigNumber $value): self
    {
        $this->bn = $this->bn->minus(to_bn($value));

        return $this;
    }

    public function mul(string|float|int|Numeric|BigNumber $value): self
    {
        $this->bn = $this->bn->multipliedBy(to_bn($value));

        return $this;
    }

    public function div(
        string|float|int|Numeric $value,
        ?int $scale = null,
        int $roundingMode = RoundingMode::UNNECESSARY
    ): self {
        $this->bn = $this->bn->dividedBy(to_bn($value), $scale, $roundingMode);

        return $this;
    }
}
