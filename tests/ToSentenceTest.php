<?php

namespace Tests;

class ToSentenceTest extends BaseStringSuite
{
    public function __validData(): array
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

    /**
     * @dataProvider __validData
     */
    public function testStringIsTransformedToTheSentenceFormat($expected, $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->toSentence()->value());
    }
}
