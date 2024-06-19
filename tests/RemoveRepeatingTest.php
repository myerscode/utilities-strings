<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class RemoveRepeatingTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['hello world. foo bar', 'hello          world. foo        bar', ' '];
        yield ['hello          world. foo        bar', 'hello          world. foo        bar', '.'];
        yield ['hello          world. foo        bar', 'hello          world..... foo        bar', '.'];
        yield ['foobar!', 'foobar!!!!!!!', '!'];
        yield ['foobar!!!!!!!', 'foobar!!!!!!!', ' '];
    }

    #[DataProvider('__validData')]
    public function testStringHasRepeatingValuesRemoved(string $expected, string $string, string $repeatingValue): void
    {
        $this->assertSame($expected, $this->utility($string)->removeRepeating($repeatingValue)->value());
    }
}
