<?php

namespace O21\Numeric\Tests;

use O21\Numeric\Exceptions\MaxValueLimitedException;
use O21\Numeric\Numeric;
use PHPUnit\Framework\TestCase;

class NumericTest extends TestCase
{
    private const LONG_FLOAT = 0.0000000000025;

    private const LONG_STR = '0.0000000000025';

    public function testDetectScale(): void
    {
        $numeric = new Numeric(0);

        $this->assertEquals(8, $numeric->scale());

        $numeric = new Numeric(self::LONG_FLOAT);

        $this->assertEquals(13, $numeric->scale());

        $numeric = new Numeric($numeric);

        $this->assertEquals(13, $numeric->scale());

        $numeric = new Numeric(self::LONG_STR);

        $this->assertEquals(13, $numeric->scale());
    }

    public function testMaxValueLimitedException(): void
    {
        $this->expectException(MaxValueLimitedException::class);

        new Numeric(100_000_000);
    }

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

    public function testScale(): void
    {
        $numeric = new Numeric(0.0000000000025);

        $this->assertEquals(13, $numeric->scale());

        $numeric->scale(10);

        $this->assertEquals(10, $numeric->scale());
        $this->assertEquals('0', $numeric->get());

        $numeric->scale(13);

        $this->assertEquals(self::LONG_STR, $numeric->get());
    }
}
