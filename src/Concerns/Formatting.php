<?php

namespace O21\Numeric\Concerns;

use Brick\Math\RoundingMode;

trait Formatting
{
    public function positive(): string
    {
        $bn = $this->bn;

        if (method_exists($bn, 'stripTrailingZeros')) {
            $bn = $bn->stripTrailingZeros();
        }

        return $bn->abs()->jsonSerialize();
    }

    public function abs(): string
    {
        return $this->positive();
    }

    public function negative(): string
    {
        $bn = $this->bn;

        if (method_exists($bn, 'stripTrailingZeros')) {
            $bn = $bn->stripTrailingZeros();
        }

        return '-'.$bn->abs()->jsonSerialize();
    }

    public function neg(): self
    {
        $this->bn = $this->bn->negated();

        return $this;
    }

    public function scale(
        int $scale,
        int|RoundingMode $roundingMode = RoundingMode::FLOOR
    ): self {
        $this->bn = $this->bn->toScale($scale, $roundingMode);

        return $this;
    }
}
