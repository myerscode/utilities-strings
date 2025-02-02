<?php

namespace Tests;

class ReplaceTest extends BaseStringSuite
{
    public static function __validData(): array
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

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testValuesAreReplaced(string $expected, string $value, string|array $replace, string $with): void
    {
        $this->assertEquals($expected, $this->utility($value)->replace($replace, $with)->value());
    }
}
