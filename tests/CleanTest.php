<?php

namespace Tests;

class CleanTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['hello world.', ' hello world. '],
            ['hello world.', '               hello world.                              '],
            ['hello world.', 'hello world.  '],
            ['hello world.', '  hello world.'],
            ['Hello World. Foo Bar', '<p>Hello World.</p><!-- Comment --> <a href="#hash">Foo Bar</a>'],
            [
                '<p>Hello World.</p><a href="#hash">Foo Bar</a>',
                '<p>Hello World.</p><!-- Comment --><a href="#hash">Foo Bar</a>',
                '<p><a>',
            ],
            [
                '<h1>Title</h1> <p>Foo Bar</p>',
                '<h1>Title</h1> <p>Foo <a href="#hash">Bar</a></p>',
                '<h1><p>',
            ],
        ];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testStringIsTrimmedAndCleaned(string $expected, string $string, ?string $allowable_tags = null): void
    {
        $this->assertEquals($expected, $this->utility($string)->clean($allowable_tags)->value());
    }
}
