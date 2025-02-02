<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;

class ToSlugTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['quick-brown-foo-bar', 'quick brown foo bar'],
            ['hello-world', 'HELLO WORLD'],
            ['foo-bar-123', 'foo bar 123'],
            ['omg-its-a-fox-d', 'omg!!! its a fox =D'],
            ['', ':"{}~`'],
            ['', '!@£$%^&*()'],
            ['extra-dashes', 'extra--dashes---'],
            ['lim-duls-high-guard', "Lim-Dûl's High Guard"],
            ['aether-vial', 'Æther Vial'],
            ['aaaaaeaa-eeee', 'ÀÁÂÄÆÃÅ èéêë'],
            ['', ''],
        ];
    }


    public function testSlugIsMadeWithCustomSeparator(): void
    {
        $this->assertEquals('hello~world', $this->utility('hello world')->toSlug('~')->value());
        $this->assertEquals('hello~world', $this->utility('hello-world')->toSlug('~')->value());
        $this->assertEquals('hello_world', $this->utility('hello___world')->toSlug('_')->value());
        $this->assertEquals('hello-_-world', $this->utility('hello world')->toSlug('-_-')->value());
        $this->assertEquals('hello-_-world', $this->utility('hello_- world')->toSlug('-_-')->value());
    }

    #[DataProvider('__validData')]
    public function testStringIsTransformedToTheSlugFormat(string $expected, string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->toSlug()->value());
    }

    public function testToSlugUTF8(): void
    {
        $this->assertEquals('lim-dûls-high-guard', $this->utility("Lim-Dûl's High Guard")->toSlugUtf8()->value());
        $this->assertEquals('bills-yall', $this->utility('$$ bill\'s yall')->toSlugUtf8()->value());
    }
}
