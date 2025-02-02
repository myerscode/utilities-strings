<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;

class RemoveRepeatingTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['hello world. foo bar', 'hello          world. foo        bar', ' '],
            ['hello          world. foo        bar', 'hello          world. foo        bar', '.'],
            ['hello          world. foo        bar', 'hello          world..... foo        bar', '.'],
            ['foobar!', 'foobar!!!!!!!', '!'],
            ['foobar!!!!!!!', 'foobar!!!!!!!', ' '],
        ];
    }

    #[DataProvider('__validData')]
    public function testStringHasRepeatingValuesRemoved(string $expected, string $string, string $repeatingValue): void
    {
        $this->assertEquals($expected, $this->utility($string)->removeRepeating($repeatingValue)->value());
    }
}
