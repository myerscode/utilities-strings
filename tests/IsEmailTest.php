<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class IsEmailTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [true, 'hello@world.com'];
        yield [true, 'test@hello.world.com'];
        yield [false, 'not@valid'];
    }

    #[DataProvider('__validData')]
    public function testStringIsInAValidEmailFormat(bool $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->isEmail());
    }
}
