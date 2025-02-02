<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;

class IsJsonTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            [true, json_encode(['foo' => 'bar'])],
            [false, 'foobar'],
        ];
    }

    #[DataProvider('__validData')]
    public function testIsTheStringValidJson(bool $expected, bool|string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->isJson());
    }
}
