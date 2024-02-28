<?php

namespace O21\Numeric\Tests;

use O21\Numeric\Numeric;
use PHPUnit\Framework\TestCase;

class ComparisonsTest extends TestCase
{
    private const LONG_FLOAT = 0.0000000000025;

    public function testEquals(): void
    {
        $num = $this->longFloat();

        $this->assertTrue($num->equals($num));
    }

    public function testGreaterThan(): void
    {
        $num = $this->longFloat();

        $this->assertTrue($num->greaterThan('0.000000000002'));
    }

    public function testGreaterThanOrEquals(): void
    {
        $num = $this->longFloat();

        $this->assertTrue($num->greaterThanOrEqual('0.0000000000025'));
    }

    public function testLessThan(): void
    {
        $num = $this->longFloat();

        $this->assertTrue($num->lessThan('0.000000000003'));
    }

    public function testLessThanOrEquals(): void
    {
        $num = $this->longFloat();

        $this->assertTrue($num->lessThanOrEqual('0.0000000000025'));
    }

    public function testMin(): void
    {
        $min = '0.00000025';

        $num = num($min);

        $biggerNumbers = [];
        for ($i = 0; $i < 10; $i++) {
            $biggerNumbers[] = (clone $num)->add(num('0.00000001')->mul($i))->get();
        }

        $this->assertEquals($min, $num->min($biggerNumbers[0])->get());
        $this->assertEquals($min, $num->min(...$biggerNumbers)->get());
        $this->assertEquals($min, $num->min('0.00000026')->get());
        $this->assertEquals($min, $num->min(0.00000026)->get());
        $this->assertEquals($min, $num->min(1)->get());
        $this->assertEquals('0.00000024', $num->min('0.00000024')->get());
    }

    public function testMax(): void
    {
        $max = '0.00000025';

        $num = num($max);

        $smallerNumbers = [];
        for ($i = 0; $i < 10; $i++) {
            $smallerNumbers[] = (clone $num)->sub(num('0.00000001')->mul($i))->get();
        }

        $this->assertEquals($max, $num->max($smallerNumbers[0])->get());
        $this->assertEquals($max, $num->max(...$smallerNumbers)->get());
        $this->assertEquals($max, $num->max('0.00000024')->get());
        $this->assertEquals($max, $num->max(0.00000024)->get());
        $this->assertEquals(1, $num->max(1)->get());
    }

    protected function longFloat(): Numeric
    {
        return new Numeric(self::LONG_FLOAT);
    }
}
