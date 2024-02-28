<?php

namespace O21\Numeric\Concerns;

use O21\Numeric\Numeric;

trait Calculations
{
    public function add(string|float|int|Numeric $value): self
    {
        $this->_dirtyValue = bcadd((string) $this, (string) (new self($value)), $this->_scale);

        return $this;
    }

    public function sub(string|float|int|Numeric $value): self
    {
        $this->_dirtyValue = bcsub((string) $this, (string) (new self($value)), $this->_scale);

        return $this;
    }

    public function mul(string|float|int|Numeric $value): self
    {
        $this->_dirtyValue = bcmul((string) $this, (string) (new self($value)), $this->_scale);

        return $this;
    }

    public function div(string|float|int|Numeric $value): self
    {
        $this->_dirtyValue = bcdiv((string) $this, (string) (new self($value)), $this->_scale);

        return $this;
    }
}
