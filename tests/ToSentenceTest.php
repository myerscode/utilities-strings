<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class ToSentenceTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['Quick brown foo bar.', 'Quick brown foo bar.'],
            ['Quick brown foo bar.', 'Quick brown foo bar'],
            ['Quick Brown foo bar.', 'Quick Brown foo bar'],
            ['Hello I\'m called Fred!', 'Hello I\'m called Fred!'],
            ['Quick brown foo bar.', 'quick brown foo bar.'],
            ['Quick brown foo bar.', 'quick brown foo bar'],
            ['Quick brown. Foo bar.', 'quick brown. foo bar.'],
            ['Quick brown. Foo bar.', 'quick brown. Foo bar'],
            ['QUICK brown.... Foo bar.', 'QUICK brown.... Foo bar'],
        ];
    }

    /**
     * Test that the string is transformed to the sentence format
     *
     * @param string $expected The value expected to be returned
     * @param string $string The string to strip values from
     * @dataProvider dataProvider
     * @covers ::toSentence
     */
    public function testStringIsTransformedToTheSentenceFormat($expected, $string)
    {
        $this->assertEquals($expected, $this->utility($string)->toSentence()->value());
    }
}
