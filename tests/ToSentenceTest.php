<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class ToSentenceTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['Quick brown foo bar.', 'Quick brown foo bar.'];
        yield ['Quick brown foo bar.', 'Quick brown foo bar'];
        yield ['Quick Brown foo bar.', 'Quick Brown foo bar'];
        yield ["Hello I'm called Fred!", "Hello I'm called Fred!"];
        yield ['Quick brown foo bar.', 'quick brown foo bar.'];
        yield ['Quick brown foo bar.', 'quick brown foo bar'];
        yield ['Quick brown. Foo bar.', 'quick brown. foo bar.'];
        yield ['Quick brown. Foo bar.', 'quick brown. Foo bar'];
        yield ['QUICK brown.... Foo bar.', 'QUICK brown.... Foo bar'];
    }

    #[DataProvider('__validData')]
    public function testStringIsTransformedToTheSentenceFormat(string $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->toSentence()->value());
    }
}
