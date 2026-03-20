<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class MinimiseTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [
            'hello world. quick brown fox. <select><option>foobar</select>',
            'hello world.     quick


        brown 

               fox.
                        <select><option>foobar</option></select>

        ',
        ];
        yield ['foo bar', 'foo   bar'];
        yield ['', ''];
        yield ['hello', '  hello  '];
        yield ['a b', "a\t\tb"];
    }

    #[DataProvider('__validData')]
    public function testTextGetsMinimised(string $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->minimise()->value());
    }
}
