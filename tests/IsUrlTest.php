<?php

declare(strict_types=1);

namespace Tests;

use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;

final class IsUrlTest extends BaseStringSuite
{
    public static function __protocolData(): Iterator
    {
        yield [true, 'http://example.com', ['http', 'https']];
        yield [true, 'https://example.com', ['http', 'https']];
        yield [false, 'ftp://example.com', ['http', 'https']];
        yield [true, 'HTTPS://example.com', ['https']];
        yield [true, 'ftp://example.com', ['FTP']];
        yield [false, 'http://example.com', ['https']];
    }
    public static function __validData(): Iterator
    {
        yield [true, 'http://example.com'];
        yield [true, 'https://example.com'];
        yield [true, 'https://example.com/path?query=1#anchor'];
        yield [true, 'ftp://files.example.com'];
        yield [false, 'example.com'];
        yield [false, 'not a url'];
        yield [false, ''];
        yield [false, 'https://'];
        yield [false, 'foobar'];
    }

    #[DataProvider('__validData')]
    public function testIsUrlMethod(bool $expected, string $string): void
    {
        $this->assertSame($expected, $this->utility($string)->isUrl());
    }

    /**
     * @param  array<string>  $protocols
     */
    #[DataProvider('__protocolData')]
    public function testIsUrlWithProtocols(bool $expected, string $string, array $protocols): void
    {
        $this->assertSame($expected, $this->utility($string)->isUrl($protocols));
    }
}
