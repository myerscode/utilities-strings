<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use Iterator;

final class EncodingTest extends BaseStringSuite
{
    public static function __validData(): Iterator
    {
        yield ['UTF-8'];
        yield [mb_internal_encoding()];
    }

    #[DataProvider('__validData')]
    public function testStringsEncodingIsSetViaConstructor(string $encoding): void
    {
        $this->assertSame($encoding, $this->utility('hello world', $encoding)->encoding());
    }

    #[DataProvider('__validData')]
    public function testStringsEncodingIsSetViaMethod(string $encoding): void
    {
        $this->assertSame($encoding, $this->utility('hello world')->setEncoding($encoding)->encoding());
    }
}
