<?php

namespace Tests;



/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class FormatTest extends BaseStringSuite
{
    /**
     * Verify placeholder keys can be repeated
     *
     * @covers ::format
     */
    public function testPlaceholderAreReplaced()
    {
        $this->assertEquals(
            'Hello World! This is a test!',
            $this->utility('Hello {0}! This is a {1}!')->format('World', 'test')->value()
        );
    }

    /**
     * Verify placeholder keys can be repeated
     *
     * @covers ::format
     */
    public function testPlaceholderCanBeRepeated()
    {
        $this->assertEquals('AAAA', $this->utility('{0}{0}{0}{0}')->format('A')->value());
    }

    /**
     * Verify placeholder keys can be in any order
     *
     * @covers ::format
     */
    public function testPlaceholderOrderIsIrrelevant()
    {
        $this->assertEquals('TEST', $this->utility('{1}{0}{3}{2}')->format('E', 'T', 'T', 'S')->value());
    }

    /**
     * Verify passing no values
     *
     * @covers ::format
     */
    public function testNoValuesToFormat()
    {
        $this->assertEquals('test no placeholders', $this->utility('test no placeholders')->format()->value());
    }

    /**
     * Verify passing values but no placeholders
     *
     * @covers ::format
     */
    public function testValuesButNoPlaceholders()
    {
        $this->assertEquals(
            'test no placeholders',
            $this->utility('test no placeholders')->format('T', 'E', 'S', 'T')->value()
        );
    }

    /**
     * Verify passing values but no placeholders
     *
     * @covers ::format
     */
    public function testValuesButNoMatchingPlaceholders()
    {
        $this->assertEquals(
            'tes{4} n{5} placeholder{6}',
            $this->utility('tes{4} n{5} placeholder{6}')->format('T', 'E', 'S', 'T')->value()
        );
    }

    /**
     * Verify exception is thrown with invalid value type as replacement value
     *
     * @expectedException \Myerscode\Utilities\Strings\Exceptions\InvalidFormatArgumentException
     * @covers ::format
     */
    public function testInvalidPlaceholderProperty()
    {
        $this->utility('test {0} me')->format(new \stdClass());
    }
}
