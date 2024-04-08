# 021/numeric

A PHP library to convenient work with arbitrary precision numbers.
<p>
<a href="https://github.com/021-projects/numeric/actions/workflows/tests-php-8.1.yml"><img src="https://github.com/021-projects/numeric/actions/workflows/tests-php-8.1.yml/badge.svg?branch=master" alt="Tests"></a>
<a href="https://packagist.org/packages/021/numeric"><img src="https://img.shields.io/packagist/dt/021/numeric" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/021/numeric"><img src="https://img.shields.io/packagist/v/021/numeric" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/021/numeric"><img src="https://img.shields.io/packagist/l/021/numeric" alt="License"></a>
</p>

## Requirements

- PHP 8.1 or higher

Library is based on [Brick\Math](https://github.com/brick/math) package:
> Although the library can work seamlessly on any PHP installation, it is highly recommended that you install the [GMP](https://www.php.net/manual/en/book.gmp.php) or [BCMath](https://www.php.net/manual/en/book.bc.php) extension to speed up calculations. The fastest available calculator implementation will be automatically selected at runtime.

## Installation

You can install the package via composer:

```bash
composer require 021/numeric
```

## Usage

```php
use function O21\Numeric\Helpers\num;

$number = num('123.456');

echo $number->add('0.544')->get();
```

### Calculations

All computational functions accept as an argument a value of one of the following
types: `string|float|int|\O21\Numeric\Numeric|\Brick\Math\BigNumber`.

| Function | Description                     |
|----------|---------------------------------|
| `add`    | Adds a value to a number        |
| `sub`    | Subtracts a value from a number |
| `mul`    | Multiplies a number by a value  |
| `div`    | Divides a number by a value     |

### Comparisons

All comparison functions accept as an argument a value of one of the following
types: `string|float|int|\O21\Numeric\Numeric|\Brick\Math\BigNumber`.

| Function             | Description                                                                                          |
|----------------------|------------------------------------------------------------------------------------------------------|
| `equals`             | Checks if two values are equal. It returns true if the values are equal and false otherwise.         |
| `greaterThan`        | Compares two values and returns true if the first value is greater than the second one.              |
| `lessThan`           | Compares two values and returns true if the first value is less than the second one.                 |
| `greaterThanOrEqual` | 	Compares two values and returns true if the first value is greater than or equal to the second one. |
| `lessThanOrEqual`    | Compares two values and returns true if the first value is less than or equal to the second one.     |

### Formatting

| Function     | Description                                                                                                |
|--------------|------------------------------------------------------------------------------------------------------------|
| `positive`   | Returns a number represented as positive.                                                                  |
| `negative`   | Returns a number represented as negative.                                                                  |
| `scale`      | Converts a number to a  given scale, using rounding if necessary.                                          |
| `get`        | Returns a number as string. By default removes trailing zeros. Use the `raw: true` option to disable this. |
| `__toString` | Returns a `get` function result                                                                            |

### Helpers

Namespace: `O21\Numeric\Helpers`

| Function  | Description                                                                                                                                |
|-----------|--------------------------------------------------------------------------------------------------------------------------------------------|
| `num`     | Creates a new `Numeric` instance                                                                                                           |
| `num_min` | Returns a minimum value from a given values. Support any of these types: `string\|float\|int\|\O21\Numeric\Numeric\|\Brick\Math\BigNumber` |
| `num_max` | Returns a maximum value from a given values. Support any of these types: `string\|float\|int\|\O21\Numeric\Numeric\|\Brick\Math\BigNumber` |
| `to_bn`   | Converts any of these types `string\|float\|int\|\O21\Numeric\Numeric\|\Brick\Math\BigNumber` to `\Brick\Math\BigNumber`                   |
