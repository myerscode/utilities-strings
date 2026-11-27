<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class RemoveRepeatingTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['hello world. foo bar', 'hello          world. foo        bar', ' '];
        yield ['hello          world. foo        bar', 'hello          world. foo        bar', '.'];
        yield ['hello          world. foo        bar', 'hello          world..... foo        bar', '.'];
        yield ['foobar!', 'foobar!!!!!!!', '!'];
        yield ['foobar!!!!!!!', 'foobar!!!!!!!', ' '];
    }

    public function testEmptyRepeatingValueLeavesStringUnchanged(): void
    {
        $this->assertSame('Rupert  and  Gerald', $this->utility('Rupert  and  Gerald')->removeRepeating('')->value());
    }

    #[DataProvider('__validData')]
    public function testStringHasRepeatingValuesRemoved(string $expected, string $string, string $repeatingValue): void
    {
        $this->assertSame($expected, $this->utility($string)->removeRepeating($repeatingValue)->value());
    }
}
