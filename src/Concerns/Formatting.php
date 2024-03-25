<?php

namespace O21\Numeric\Concerns;

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
}
