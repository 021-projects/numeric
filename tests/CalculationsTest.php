<?php

namespace O21\Numeric\Tests;

use Brick\Math\RoundingMode;
use O21\Numeric\Numeric;
use PHPUnit\Framework\TestCase;

class CalculationsTest extends TestCase
{
    private const LONG_FLOAT = 0.0000000000025;

    public function testAdd(): void
    {
        $num = $this->longFloat();

        $this->assertEquals('0.000000000005', $num->add($num)->get());
    }

    public function testSubtract(): void
    {
        $num = $this->longFloat();

        $this->assertEquals('0.0000000000005', $num->sub('0.000000000002')->get());
    }

    public function testMultiply(): void
    {
        $num = $this->longFloat();

        $this->assertEquals('0.0000000005', $num->mul(200)->get());
    }

    public function testDivide(): void
    {
        $num = $this->longFloat();

        $this->assertEquals('0.000000025', $num->div('0.0001')->get());
    }

    public function testDivideWithoutRoundingMode(): void
    {
        $num = $this->longFloat()->scale(22);

        $this->assertEquals('0.000000000000025', $num->div(100)->get());
    }

    protected function longFloat(): Numeric
    {
        return new Numeric(self::LONG_FLOAT);
    }
}
