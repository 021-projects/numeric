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

    public function negative(): string
    {
        $bn = $this->bn;

        if (method_exists($bn, 'stripTrailingZeros')) {
            $bn = $bn->stripTrailingZeros();
        }

        return '-'.$bn->abs()->jsonSerialize();
    }

    public function scale(
        int $scale,
        RoundingMode $roundingMode = RoundingMode::UNNECESSARY
    ): self {
        $this->bn = $this->bn->toScale($scale, $roundingMode);

        return $this;
    }
}
