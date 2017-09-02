<?php

namespace Tests\StringUtility;

use Tests\Support\BaseStringSuite;

/**
 * @coversDefaultClass Myerscode\Utilities\Strings\Utility
 */
class PrepareForCasingTest extends BaseStringSuite
{

    public function dataProvider()
    {
        return [
            ['fooBar', ['foo', 'Bar'],],
            ['hello_world', ['hello', 'world'],],
            ['hello_world', ['hello', 'world'],],
            ['  foo b ar', ['foo', 'b', 'ar']],
            ['FooUBar', ['Foo', 'U', 'Bar']],
            ['FooICYou', ['Foo', 'I', 'C', 'You']],
            ['string_with1number', ['string', 'with', '1', 'number']],
            ['omg!!! its a fox =D', ['omg!!!', 'its', 'a', 'fox', '=D']],
        ];
    }

    /**
     * Check that the number is rounded correctly
     *
     * @param string $string
     * @param string $expected The value expected to be returned
     * @dataProvider dataProvider
     * @covers ::prepareForCasing
     */
    public function testExpectedResults($string, $expected)
    {
        $class = $this->utility($string);
        $reflection = new \ReflectionClass(get_class($class));
        $method = $reflection->getMethod('prepareForCasing');
        $method->setAccessible(true);
        ;
        $this->assertEquals($expected, $method->invokeArgs($class, [$string]));
    }
}
