<?php

namespace Tests;

class CleanTest extends BaseStringSuite
{
    public function __validData(): array
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

    /**
     * @dataProvider __validData
     */
    public function testStringIsTrimmedAndCleaned($expected, $string, $allowable_tags = null): void
    {
        $this->assertEquals($expected, $this->utility($string)->clean($allowable_tags)->value());
    }
}
