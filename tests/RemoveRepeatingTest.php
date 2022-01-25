<?php

namespace Tests;

class RemoveRepeatingTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['hello world. foo bar', 'hello          world. foo        bar', ' '],
            ['hello          world. foo        bar', 'hello          world. foo        bar', '.'],
            ['hello          world. foo        bar', 'hello          world..... foo        bar', '.'],
            ['foobar!', 'foobar!!!!!!!', '!'],
            ['foobar!!!!!!!', 'foobar!!!!!!!', ' '],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testStringHasRepeatingValuesRemoved($expected, $string, $repeatingValue): void
    {
        $this->assertEquals($expected, $this->utility($string)->removeRepeating($repeatingValue)->value());
    }
}
