<?php

namespace Tests;

use Myerscode\Utilities\Strings\Exceptions\InvalidFormatArgumentException;
use stdClass;

class FormatTest extends BaseStringSuite
{
    public function testInvalidPlaceholderProperty(): void
    {
        $this->expectException(InvalidFormatArgumentException::class);
        $this->utility('test {0} me')->format([new stdClass()]);
    }

    public function testNoValuesToFormat(): void
    {
        $this->assertSame('test no placeholders', $this->utility('test no placeholders')->format()->value());
    }

    public function testPlaceholderAreReplaced(): void
    {
        $this->assertSame(
            'Hello World! This is a test!',
            $this->utility('Hello {0}! This is a {1}!')->format(['World', 'test'])->value()
        );
    }

    public function testPlaceholderCanBeRepeated(): void
    {
        $this->assertSame('AAAA', $this->utility('{0}{0}{0}{0}')->format(['A'])->value());
    }

    public function testPlaceholderOrderIsIrrelevant(): void
    {
        $this->assertSame('TEST', $this->utility('{1}{0}{3}{2}')->format(['E', 'T', 'T', 'S'])->value());
    }

    public function testValuesButNoMatchingPlaceholders(): void
    {
        $this->assertSame(
            'tes{4} n{5} placeholder{6}',
            $this->utility('tes{4} n{5} placeholder{6}')->format(['T', 'E', 'S', 'T'])->value()
        );
    }

    public function testValuesButNoPlaceholders(): void
    {
        $this->assertSame(
            'test no placeholders',
            $this->utility('test no placeholders')->format(['T', 'E', 'S', 'T'])->value()
        );
    }
}
