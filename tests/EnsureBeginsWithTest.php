<?php

namespace Tests;

class EnsureBeginsWithTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['foobar', 'bar', 'foo'],
            ['foobar', 'foobar', 'foo'],
            ['foofobar', 'fobar', 'foo'],
            ['foooobar', 'foooobar', 'foo'],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testStringIsMadeToBeginWithValue($expected, $string, $ensure): void
    {
        $this->assertEquals($expected, $this->utility($string)->ensureBeginsWith($ensure));
    }
}
