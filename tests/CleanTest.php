<?php

namespace Tests;



/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class CleanTest extends BaseStringSuite
{

    public function dataProvider()
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
                '<p><a>'
            ],
            [
                '<h1>Title</h1> <p>Foo Bar</p>',
                '<h1>Title</h1> <p>Foo <a href="#hash">Bar</a></p>',
                '<h1><p>'
            ],
        ];
    }

    /**
     * Check a value is trimmed and cleaned
     *
     * @param $expected
     * @param $string
     * @param null $allowable_tags
     *
     * @dataProvider dataProvider
     * @covers ::clean
     */
    public function testStringIsTrimmedAndCleaned($expected, $string, $allowable_tags = null)
    {
        $this->assertEquals($expected, $this->utility($string)->clean($allowable_tags)->value());
    }
}
