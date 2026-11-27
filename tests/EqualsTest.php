<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use Myerscode\Utilities\Strings\Utility;
use PHPUnit\Framework\Attributes\DataProvider;
use Stringable;

final class EqualsTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [true, 'Hello World', 'Hello World'];
        yield [false, 'hello world', 'Hello World'];
        yield [false, 'Hello World', 'hello world'];
        yield [true, '', ''];
        yield [false, ' ', ''];
        yield [true, 'foo', 'foo'];
        yield [false, 'foo', 'bar'];
        yield [true, '0', '0'];
        yield [false, '0', ''];
    }

    #[DataProvider('__validData')]
    public function testEquals(bool $expected, string $string, string|Utility $compareTo): void
    {
        $this->assertSame($expected, $this->utility($string)->equals($compareTo));
    }

    public function testEqualsComparesStringValuesOfUtilityAndStringable(): void
    {
        $stringable = new class () implements Stringable {
            public function __toString(): string
            {
                return 'Rupert';
            }
        };

        $this->assertTrue($this->utility('Rupert')->equals(new Utility('Rupert')));
        $this->assertTrue($this->utility(new Utility('Rupert'))->equals('Rupert'));
        $this->assertTrue($this->utility('Rupert')->equals($stringable));
        $this->assertFalse($this->utility('Gerald')->equals($stringable));
    }
}
