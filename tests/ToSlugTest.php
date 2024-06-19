<?php

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
class ToSlugTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['quick-brown-foo-bar', 'quick brown foo bar'];
        yield ['hello-world', 'HELLO WORLD'];
        yield ['foo-bar-123', 'foo bar 123'];
        yield ['omg-its-a-fox-d', 'omg!!! its a fox =D'];
        yield ['', ':"{}~`'];
        yield ['', '!@£$%^&*()'];
        yield ['extra-dashes', 'extra--dashes---'];
        yield ['lim-duls-high-guard', "Lim-Dûl's High Guard"];
        yield ['aether-vial', 'Æther Vial'];
        yield ['aaaaaeaa-eeee', 'ÀÁÂÄÆÃÅ èéêë'];
        yield ['', ''];
    }


    public function testSlugIsMadeWithCustomSeparator(): void
    {
        $this->assertSame('hello~world', $this->utility('hello world')->toSlug('~')->value());
        $this->assertSame('hello~world', $this->utility('hello-world')->toSlug('~')->value());
        $this->assertSame('hello_world', $this->utility('hello___world')->toSlug('_')->value());
        $this->assertSame('hello-_-world', $this->utility('hello world')->toSlug('-_-')->value());
        $this->assertSame('hello-_-world', $this->utility('hello_- world')->toSlug('-_-')->value());
    }

    #[DataProvider('__validData')]
    public function testStringIsTransformedToTheSlugFormat(string $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->toSlug()->value());
    }

    public function testToSlugUTF8(): void
    {
        $this->assertSame('lim-dûls-high-guard', $this->utility("Lim-Dûl's High Guard")->toSlugUtf8()->value());
        $this->assertSame('bills-yall', $this->utility('$$ bill\'s yall')->toSlugUtf8()->value());
    }
}
