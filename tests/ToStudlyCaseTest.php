<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class ToStudlyCaseTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['FooBar', 'fooBar'];
        yield ['FooBar', 'foo-Bar'];
        yield ['FooBar', '   foo bar    '];
        yield ['Bar', ' bar'];
        yield ['FooBar', 'foo bar'];
        yield ['FooBar', 'foo -bar'];
        yield ['FooBar', '-foo - bar'];
        yield ['FooBar', 'foo_bar'];
        yield ['FooCFoo', '  foo c foo'];
        yield ['FooUBar', 'fooUBar'];
        yield ['FooCCBar', 'fooCCBar'];
        yield ['StringWith1Number', 'string_with1number'];
        yield ['StringWith22Numbers', 'String-with_2_2 numbers'];
        yield ['1Foo2Bar', '1foo2bar'];
        yield ['QuickBrownFox', 'quickBrownFox'];
        yield ['FooΣase', 'foo Σase'];
        yield ['ΣτανιλFooBar', 'Στανιλ foo bar'];
        yield ['ΣashBar', 'Σash  Bar'];
    }

    #[DataProvider('__validData')]
    public function testStringIsTransformedToTheStudlyCaseFormat(string $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->toStudlyCase()->value());
    }
}
