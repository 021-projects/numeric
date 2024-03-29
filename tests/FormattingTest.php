<?php

namespace O21\Numeric\Tests;

use Brick\Math\RoundingMode;
use PHPUnit\Framework\TestCase;

use function O21\Numeric\Helpers\num;

class FormattingTest extends TestCase
{
    private const LONG_FLOAT = 0.0000000000025;

    public function testPositive(): void
    {
        $num = num(-self::LONG_FLOAT);

        $this->assertEquals('-0.0000000000025', $num->get());
        $this->assertEquals('0.0000000000025', $num->positive());
    }

    public function testNegative(): void
    {
        $num = num(self::LONG_FLOAT);

        $this->assertEquals('0.0000000000025', $num->get());
        $this->assertEquals('-0.0000000000025', $num->negative());
    }

    public function testScale(): void
    {
        $num = num(self::LONG_FLOAT);

        $this->assertEquals('0.0000000000025', $num->get());
        $this->assertEquals(
            '0.000000000',
            $num->scale(9, RoundingMode::DOWN)
                ->get(raw: true)
        );
    }

    public function testScaleWithoutRoundingMode(): void
    {
        $num = num(self::LONG_FLOAT);

        $this->assertEquals('0.0000000000025', $num->get());
        $this->assertEquals(
            '0.000000000',
            $num->scale(9)
                ->get(raw: true)
        );
    }
}
