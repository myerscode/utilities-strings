<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class RemovePunctuationTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['hello          world foo        bar', 'hello          world. foo        bar'];
        yield ['hello world foo bar', 'hello world. foo bar'];
        yield ['foo bar 123', 'foo. bar. 123.'];
        yield ['Hello Its a great day today', "Hello. It's a great day today."];
        yield ['omg its a fox D', "omg!!! it's a fox =D"];
        yield ['', ':"{}~`'];
        yield ['£', '!@£$%^&*()'];
        yield ['', ''];
    }

    #[DataProvider('__validData')]
    public function testStringHasPunctuationRemoved(string $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->removePunctuation()->value());
    }
}
