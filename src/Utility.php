<?php

namespace Myerscode\Utilities\Strings;

use Myerscode\Utilities\Strings\Exceptions\InvalidStringException;

/**
 * Class Utility
 *
 * @package Myerscode\Utilities\Strings
 */
class Utility
{

    /**
     * The string to be modified
     *
     * @var string
     */
    private $string;

    /**
     * The string encoding
     *
     * @var string
     */
    private $encoding;

    /**
     * Utility constructor.
     *
     * @param string $string
     * @param null $encoding
     */
    public function __construct($string = '', $encoding = null)
    {
        if (is_array($string)) {
            throw new InvalidStringException('Arrays cannot be converted to string');
        } elseif (is_object($string) && !method_exists($string, '__toString')) {
            throw new InvalidStringException('Passed object must have a __toString method');
        } elseif (is_bool($string)) {
            $this->string = ($string) ? '1' : '0';
        } else {
            $this->string = (string)$string;
        }

        $this->encoding = $encoding ?: \mb_internal_encoding();
    }

    /**
     * Return the value when casting to string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->value();
    }

    /**
     * Append the string with a given value
     *
     * @param $postfix
     * @return $this
     */
    public function append($postfix)
    {
        return new static($this->string . new static($postfix, $this->encoding), $this->encoding);
    }

    /**
     * Get the strings encoding
     *
     * @return mixed
     */
    public function encoding()
    {
        return $this->encoding;
    }

    /**
     * Create a new instance of the string utility
     *
     * @param $string
     * @param $encoding
     * @return static
     */
    public static function make($string, $encoding = null)
    {
        return new static($string, $encoding);
    }

    /**
     * Return the value when casting to string
     *
     * @return string
     */
    public function value()
    {
        return $this->string;
    }
}
