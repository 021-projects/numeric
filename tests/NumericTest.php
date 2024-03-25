<?php

namespace O21\Numeric\Tests;

use O21\Numeric\Numeric;
use PHPUnit\Framework\TestCase;

class NumericTest extends TestCase
{
    private const LONG_FLOAT = 0.0000000000025;

    private const LONG_STR = '0.0000000000025';

    public function testGet(): void
    {
        $numeric = new Numeric(self::LONG_FLOAT);

        $this->assertEquals(self::LONG_STR, $numeric->get());
    }

    public function testToString(): void
    {
        $numeric = new Numeric(self::LONG_FLOAT);

        $this->assertEquals(self::LONG_STR, $numeric->__toString());
        $this->assertEquals(self::LONG_STR, (string) $numeric);
    }
}
