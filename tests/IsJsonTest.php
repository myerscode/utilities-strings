<?php

namespace Tests;

class IsJsonTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            [true, json_encode(['foo' => 'bar'])],
            [false, 'foobar'],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testIsTheStringValidJson($expected, $string): void
    {
        $this->assertEquals($expected, $this->utility($string)->isJson());
    }
}
