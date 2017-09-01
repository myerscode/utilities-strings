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
     * Does string start with a given value(s).
     * You can pass a single string or an array of strings to look check for.
     *
     * @param string|array $search String(s) to look at the beginning for
     * @param bool $strict [optional] Should do a case sensitive check
     * @return bool
     */
    public function beginsWith($search, bool $strict = false)
    {
        if (empty($search)) {
            return false;
        }

        $needles = !is_array($search) ? [$search] : $search;

        foreach ($needles as $needle) {
            if ($strict) {
                if (strcmp(substr($this->string, 0, strlen($needle)), $needle) === 0) {
                    return true;
                }
            } else {
                if (strcasecmp(substr($this->string, 0, strlen($needle)), $needle) === 0) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Remove tags and trim the string
     *
     * @param string $allowable_tags [optional] Tags to keep when passing through strip_tags
     * @return $this
     */
    public function clean(string $allowable_tags = null)
    {
        $string = strip_tags(trim($this->string), $allowable_tags);

        return new static($string, $this->encoding);
    }

    /**
     * Check if a string contains all of the given values
     *
     * @param string|array $needles Values to look for in the string
     * @param int $offset [optional] Search will start this number of characters from the beginning of the string.
     * @return bool
     */
    public function containsAll($needles, $offset = 0)
    {
        if (!is_array($needles)) {
            $needles = [$needles];
        }

        foreach ($needles as $query) {
            if (strpos($this->string, $query, $offset) === false) {
                return false;
            }
        }

        return true;
    }

    /**
     * Check if a string contains any of the given values
     *
     * @param string|array $needles Values to look for in the string
     * @param int $offset [optional] Search will start this number of characters from the beginning of the string.
     * @return bool
     */
    public function containsAny($needles, $offset = 0)
    {
        if (!is_array($needles)) {
            $needles = [$needles];
        }

        foreach ($needles as $query) {
            if (strpos($this->string, $query, $offset) !== false) {
                return true;
            }
        }

        return false;
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
     * Does string end with a given value(s).
     * You can pass a single string or an array of strings to look check for.
     *
     * @param string|array $search String(s) to look at the beginning for
     * @param bool $strict [optional] Should do a case sensitive check
     * @return bool
     */
    public function endsWith($search, bool $strict = false)
    {
        if (empty($search)) {
            return false;
        }

        $needles = !is_array($search) ? [$search] : $search;

        foreach ($needles as $needle) {
            if ($strict) {
                if (strcmp(substr($this->string, strlen($this->string) - strlen($needle)), $needle) === 0) {
                    return true;
                }
            } else {
                if (strcasecmp(substr($this->string, strlen($this->string) - strlen($needle)), $needle) === 0) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Ensure the string starts with a given value
     *
     * @param $ensure
     * @return $this
     */
    public function ensureBeginsWith($ensure)
    {
        if (!$this->beginsWith($ensure)) {
            return $this->prepend($ensure);
        }

        return $this;
    }

    /**
     * Ensure the string starts with a given value
     *
     * @param $ensure
     * @return $this
     */
    public function ensureEndsWith($ensure)
    {
        if (!$this->endsWith($ensure)) {
            return $this->append($ensure);
        }

        return $this;
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
     * Prepend the string with a given value
     *
     * @param $prefix
     * @return $this
     */
    public function prepend($prefix)
    {
        return new static(new static($prefix, $this->encoding) . $this->string, $this->encoding);
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
