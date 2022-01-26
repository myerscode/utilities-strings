<?php

namespace Tests;

class TrimTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['foobar', '!!!!!foobar!!!!!', '!'],
            ['foobar', '!!!!!foobar', '!'],
            ['foobar', 'foobar!!!!!', '!'],
        ];
    }

    public function testStringIsStrippedOfDefaultValues(): void
    {
        $this->assertEquals('foobar', $this->utility('        foobar         ')->trim()->value());
    }

    /**
     * @dataProvider __validData
     */
    public function testStringIsStrippedOfGivenValues($expected, $string, $charList): void
    {
        $this->assertEquals($expected, $this->utility($string)->trim($charList)->value());
    }
}
