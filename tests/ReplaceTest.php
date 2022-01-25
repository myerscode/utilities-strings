<?php

namespace Tests;

class ReplaceTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['', '', '', ''],
            ['foofoo', 'foobar', 'bar', 'foo'],
            ['foo', 'foobar', 'bar', ''],
            ['foo', 'foobar', 'bar', ''],
            ['foofoo', 'foobar', ['bar'], 'foo'],
            ['hellohello', 'foobar', ['foo', 'bar'], 'hello'],
            ['foofoofoofoo', 'foobarfoobar', 'bar', 'foo'],
            ['foofoofoofoo', 'foobarfoobar', ['bar'], 'foo'],
            ['foodotbar', 'foo.bar', '.', 'dot'],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testValuesAreReplaced($expected, $value, $replace, $with): void
    {
        $this->assertEquals($expected, $this->utility($value)->replace($replace, $with)->value());
    }
}
