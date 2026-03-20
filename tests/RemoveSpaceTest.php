<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class RemoveSpaceTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield [
            'helloworld.quickbrownfox.foobar',
            'hello world.     quick


        brown 

               fox.
                                            foo


                                            bar
        ',
        ];
        yield ['foobar', 'foo bar'];
        yield ['', ''];
        yield ['abc', ' a b c '];
        yield ['hello', "hello\t\n\r"];
    }

    #[DataProvider('__validData')]
    public function testTextHasSpacesRemoved(string $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->removeSpace()->value());
    }
}
