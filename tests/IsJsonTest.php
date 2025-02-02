<?php

namespace Tests;

class IsJsonTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            [true, json_encode(['foo' => 'bar'])],
            [false, 'foobar'],
        ];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testIsTheStringValidJson(bool $expected, bool|string $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->isJson());
    }
}
