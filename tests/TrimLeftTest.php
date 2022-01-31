<?php

namespace Tests;

class TrimLeftTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['fobar', '!!!!!fobar', '!'],
            ['fobar!!!!!', 'fobar!!!!!', '!'],
            ['o World!', 'Hello World!', ['H', 'el']],
        ];
    }

    public function testStringIsStrippedOfDefaultValues(): void
    {
        $this->assertEquals('forbar', $this->utility('          forbar')->trimLeft()->value());
    }

    /**
     * @dataProvider __validData
     */
    public function testStringIsStrippedOfGivenValues($expected, $string, $charList): void
    {
        $this->assertEquals($expected, $this->utility($string)->trimLeft($charList)->value());
    }
}
