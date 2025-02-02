<?php

namespace Tests;

class EncodingTest extends BaseStringSuite
{
    public static function __validData(): array
    {
        return [
            ['UTF-8'],
            [mb_internal_encoding()],
        ];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testStringsEncodingIsSetViaConstructor(string $encoding): void
    {
        $this->assertEquals($encoding, $this->utility('hello world', $encoding)->encoding());
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('__validData')]
    public function testStringsEncodingIsSetViaMethod(string $encoding): void
    {
        $this->assertEquals($encoding, $this->utility('hello world')->setEncoding($encoding)->encoding());
    }
}
