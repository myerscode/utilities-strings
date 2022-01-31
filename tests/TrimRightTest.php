<?php

namespace Tests;

class TrimRightTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['!!!!!fobar', '!!!!!fobar', '!'],
            ['fobar', 'fobar!!!!!', '!'],
            ['He', 'Hello World!', ['Wor', 'ld!', ' ']],
        ];
    }

    public function testStringIsStrippedOfDefaultValues(): void
    {
        $this->assertEquals('forbar', $this->utility('forbar         ')->trimRight()->value());
    }

    /**
     * @dataProvider __validData
     */
    public function testStringIsStrippedOfGivenValues($expected, $string, $charList): void
    {
        $this->assertEquals($expected, $this->utility($string)->trimRight($charList)->value());
    }
}
