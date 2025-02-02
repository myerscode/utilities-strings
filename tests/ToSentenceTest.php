<?php

namespace Tests;

class ToSentenceTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['Quick brown foo bar.', 'Quick brown foo bar.'],
            ['Quick brown foo bar.', 'Quick brown foo bar'],
            ['Quick Brown foo bar.', 'Quick Brown foo bar'],
            ["Hello I'm called Fred!", "Hello I'm called Fred!"],
            ['Quick brown foo bar.', 'quick brown foo bar.'],
            ['Quick brown foo bar.', 'quick brown foo bar'],
            ['Quick brown. Foo bar.', 'quick brown. foo bar.'],
            ['Quick brown. Foo bar.', 'quick brown. Foo bar'],
            ['QUICK brown.... Foo bar.', 'QUICK brown.... Foo bar'],
        ];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testStringIsTransformedToTheSentenceFormat(string $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->toSentence()->value());
    }
}
