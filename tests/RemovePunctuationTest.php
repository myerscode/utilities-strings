<?php

namespace Tests;

class RemovePunctuationTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['hello          world foo        bar', 'hello          world. foo        bar'],
            ['hello world foo bar', 'hello world. foo bar'],
            ['foo bar 123', 'foo. bar. 123.'],
            ['Hello Its a great day today', "Hello. It's a great day today."],
            ['omg its a fox D', "omg!!! it's a fox =D"],
            ['', ':"{}~`'],
            ['£', '!@£$%^&*()'],
            ['', ''],
        ];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testStringHasPunctuationRemoved(string $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->removePunctuation()->value());
    }
}
