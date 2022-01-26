<?php

namespace Tests;

class EncodingTest extends BaseStringSuite
{
    public function __validData(): array
    {
        return [
            ['UTF-8'],
            [mb_internal_encoding()],
        ];
    }

    /**
     * @dataProvider __validData
     */
    public function testStringsEncodingIsSetViaConstructor($encoding): void
    {
        $this->assertEquals($encoding, $this->utility('hello world', $encoding)->encoding());
    }

    /**
     * @dataProvider __validData
     */
    public function testStringsEncodingIsSetViaMethod($encoding): void
    {
        $this->assertEquals($encoding, $this->utility('hello world')->setEncoding($encoding)->encoding());
    }
}
