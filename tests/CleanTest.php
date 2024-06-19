<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class CleanTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['hello world.', ' hello world. '];
        yield ['hello world.', '               hello world.                              '];
        yield ['hello world.', 'hello world.  '];
        yield ['hello world.', '  hello world.'];
        yield ['Hello World. Foo Bar', '<p>Hello World.</p><!-- Comment --> <a href="#hash">Foo Bar</a>'];
        yield [
            '<p>Hello World.</p><a href="#hash">Foo Bar</a>',
            '<p>Hello World.</p><!-- Comment --><a href="#hash">Foo Bar</a>',
            '<p><a>',
        ];
        yield [
            '<h1>Title</h1> <p>Foo Bar</p>',
            '<h1>Title</h1> <p>Foo <a href="#hash">Bar</a></p>',
            '<h1><p>',
        ];
    }

    #[DataProvider('__validData')]
    public function testStringIsTrimmedAndCleaned(string $expected, string $string, string $allowable_tags = null): void
    {
        $this->assertSame($expected, $this->utility($string)->clean($allowable_tags)->value());
    }
}
