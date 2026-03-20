<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class SwapTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['bar foo', 'foo bar', ['foo' => 'bar', 'bar' => 'foo']];
        yield ['Hello World', 'Hello World', []];
        yield ['Hello World', 'Hi World', ['Hi' => 'Hello']];
        yield ['abc', 'xyz', ['x' => 'a', 'y' => 'b', 'z' => 'c']];
        yield ['', '', ['foo' => 'bar']];
        yield ['Hello World', 'Hello World', ['xyz' => 'abc']];
        yield ['foobär', 'foobaz', ['baz' => 'bär']];
        yield ['1-2-3', 'a-b-c', ['a' => '1', 'b' => '2', 'c' => '3']];
        yield ['HELLO world', 'hello WORLD', ['hello' => 'HELLO', 'WORLD' => 'world']];
        yield ['foo foo', 'bar bar', ['bar' => 'foo']];
    }

    #[DataProvider('__validData')]
    public function testSwapMethod(string $expected, string $string, array $map): void
    {
        $this->assertSame($expected, $this->utility($string)->swap($map)->value());
    }
}
