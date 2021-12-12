<?php

namespace Myerscode\Utilities\Strings;

use Myerscode\Utilities\Strings\Exceptions\InvalidFormatArgumentException;
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
     * @param mixed $string
     * @param null|string $encoding
     */
    public function __construct($string = '', string $encoding = null)
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

        $this->setEncoding($encoding ?: mb_internal_encoding());
    }

    /**
     * Return the value when casting to string
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->value();
    }

    /**
     * Append the string with a given value
     *
     * @param string $postfix Value to append to the string
     *
     * @return $this
     */
    public function append(string $postfix): Utility
    {
        return new static($this->string . new static($postfix, $this->encoding), $this->encoding);
    }

    /**
     * Adds the specified amount of left and right padding to the given string.
     * The default character used is a space.
     *
     * @param int $left Length of left padding
     * @param int $right Length of right padding
     * @param string $padding String used to pad the value
     *
     * @return $this
     */
    protected function applyPadding(int $left = 0, int $right = 0, string $padding = ' '): Utility
    {
        $length = mb_strlen($padding, $this->encoding);

        $stringLength = $this->length();

        $paddedLength = $stringLength + $left + $right;

        if (!$length || $paddedLength <= $stringLength) {
            return $this;
        }

        $leftPadding = mb_substr(str_repeat($padding, ceil($left / $length)), 0, $left, $this->encoding);

        $rightPadding = mb_substr(str_repeat($padding, ceil($right / $length)), 0, $right, $this->encoding);

        $string = $leftPadding . $this->string . $rightPadding;

        return new static($string, $this->encoding);
    }

    /**
     * Get the character at a specific index
     *
     * @param int $position
     * @return Utility
     */
    public function at(int $position): Utility
    {
        if ($position < 0) {
            return new static('', $this->encoding);
        }

        return $this->substring($position, 1);
    }

    /**
     * Does string start with a given value(s).
     * You can pass a single string or an array of strings to look check for.
     *
     * @param string|array $begins String(s) to look at the beginning for
     * @param bool $strict [optional] Should do a case sensitive check
     *
     * @return bool
     */
    public function beginsWith($begins, bool $strict = false): bool
    {
        if (empty($begins)) {
            return false;
        }

        $parameters = $this->parameters($begins);

        foreach ($parameters as $needle) {
            $beginning = $this->substring(0, strlen($needle));
            if ($strict) {
                if (strcmp($beginning, $needle) === 0) {
                    return true;
                }
            } else {
                if (strcasecmp($beginning, $needle) === 0) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Remove tags and trim the string
     *
     * @param null|string $allowedTags [optional] Tags to keep when passing through strip_tags
     *
     * @return $this
     */
    public function clean(string $allowedTags = null): Utility
    {
        $string = strip_tags(trim($this->string), $allowedTags);

        return new static($string, $this->encoding);
    }

    /**
     * Check if a string contains all of the given values
     *
     * @param string|array $contains Values to look for in the string
     * @param int $offset [optional] Search will start this number of characters from the beginning of the string.
     *
     * @return bool
     */
    public function containsAll($contains, int $offset = 0): bool
    {
        if (empty($contains)) {
            return false;
        }

        $parameters = $this->parameters($contains);


        if ($offset > $this->length()) {
            return false;
        }

        foreach ($parameters as $needle) {
            if (strpos($this->string, $needle->value(), $offset) === false) {
                return false;
            }
        }

        return true;
    }

    /**
     * Check if a string contains any of the given values
     *
     * @param string|array $contains Values to look for in the string
     * @param int $offset [optional] Search will start this number of characters from the beginning of the string.
     *
     * @return bool
     */
    public function containsAny($contains, int $offset = 0): bool
    {
        if (empty($contains)) {
            return false;
        }

        $parameters = $this->parameters($contains);

        if ($offset > $this->length()) {
            return false;
        }

        foreach ($parameters as $needle) {
            if (strpos($this->string, $needle->value(), $offset) !== false) {
                return true;
            }
        }

        return false;
    }

    /**
     * Get the strings encoding
     *
     * @return string
     */
    public function encoding(): string
    {
        return $this->encoding;
    }

    /**
     * Does string end with a given value(s).
     * You can pass a single string or an array of strings to look check for.
     *
     * @param string|array $ends String(s) to look at the beginning for
     * @param bool $strict [optional] Should do a case sensitive check
     *
     * @return bool
     */
    public function endsWith($ends, bool $strict = false): bool
    {
        if (empty($ends)) {
            return false;
        }

        $parameters = $this->parameters($ends);

        foreach ($parameters as $needle) {
            $ending = $this->substring(strlen($this->string) - strlen($needle));
            if ($strict) {
                if (strcmp($ending, $needle->value()) === 0) {
                    return true;
                }
            } else {
                if (strcasecmp($ending, $needle->value()) === 0) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Ensure the string starts with a given value
     *
     * @param string $ensure Value to ensure the string begins with
     *
     * @return $this
     */
    public function ensureBeginsWith(string $ensure): Utility
    {
        if (!$this->beginsWith($ensure)) {
            return $this->prepend($ensure);
        }

        return $this;
    }

    /**
     * Ensure the string starts with a given value
     *
     * @param string $ensure Value to ensure the string ends with
     *
     * @return $this
     */
    public function ensureEndsWith(string $ensure): Utility
    {
        if (!$this->endsWith($ensure)) {
            return $this->append($ensure);
        }

        return $this;
    }

    /**
     * Compare with another string and see if they match
     *
     * @param $compareTo
     * @return bool
     */
    public function equals(string $compareTo): bool
    {
        return ($this->string === $compareTo);
    }

    /**
     * Explode the string on a given
     *
     * @param $delimiter
     * @param $limit
     *
     * @return array
     */
    public function explode($delimiter, $limit = PHP_INT_MAX): array
    {
        return array_slice(array_map('trim', array_filter(explode($delimiter, $this->string, $limit))), 0);
    }

    /**
     * Get the first x characters from the string
     *
     * @param int $count
     * @return Utility
     */
    public function first(int $count): Utility
    {
        if ($count < 0) {
            return new static('', $this->encoding);
        }

        return $this->substring(0, $count);
    }

    /**
     * Inserts the given values into the chronological placeholders
     *
     * @param array ...$replacements Collection of items to insert into the string
     *
     * @return $this
     */
    public function format(...$replacements): Utility
    {
        $string = $this->string;

        foreach ($replacements as $index => $value) {
            if (!is_scalar($value) || (is_object($value) && !method_exists($value, '__toString'))) {
                $type = is_object($value) ? get_class($value) : gettype($value);
                throw new InvalidFormatArgumentException(
                    sprintf('Placeholder %s could not convert type %s to a string', $index, $type)
                );
            }

            $string = str_replace('{' . $index . '}', $value, $string);
        }

        return new static($string, $this->encoding);
    }

    /**
     * Does a string to only contain letters
     *
     * @return bool
     */
    public function isAlpha(): bool
    {
        return (bool)preg_match('/^[a-z\s]*$/i', $this->string);
    }

    /**
     * Does the string only contain letters and numbers
     *
     * @return bool
     */
    public function isAlphaNumeric(): bool
    {
        return (bool)preg_match('/^[a-z0-9\s]*$/i', $this->string);
    }

    /**
     * Is the string in a valid email format
     *
     * @return bool
     */
    public function isEmail(): bool
    {
        return filter_var($this->string, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Check if a given value can be perceived as false.
     * Will only return false if the value "looks false-y" by being a value of "false", "0", "no", "off", ""
     *
     * @return bool
     */
    public function isFalse(): bool
    {
        return (
            in_array($this->string, ['']) ||
            (false === filter_var($this->string, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE))
        );
    }

    /**
     * Is the string valid json
     *
     * @return bool
     */
    public function isJson(): bool
    {
        json_decode($this->string);

        return (json_last_error() == JSON_ERROR_NONE);
    }

    /**
     * Does the string only contain letters and numbers
     *
     * @return bool
     */
    public function isNumeric(): bool
    {
        return (!empty($this->string) && preg_match('/^[0-9]*$/i', $this->string));
    }

    /**
     * Check if a given value can be perceived as true
     * Will on return true if the value "looks true-y"
     * "true", "1", "yes", "on", "ok"
     *
     * @return bool
     */
    public function isTrue(): bool
    {
        return (
            in_array($this->string, ['ok']) ||
            (true === filter_var($this->string, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE))
        );
    }

    /**
     * The length of the string.
     *
     * @return int
     */
    public function length(): int
    {
        return \mb_strlen($this->string, $this->encoding());
    }

    /**
     * Limit the length of the string to a given value
     *
     * @param int $length Desired length the string should be
     *
     * @return $this
     */
    public function limit(int $length)
    {
        $string = $this->string;

        if ($this->length() > $length) {
            $string = substr($string, 0, $length);
        }

        return new static($string, $this->encoding);
    }

    /**
     * Create a new instance of the string utility
     *
     * @param $string
     * @param null|string $encoding
     *
     * @return $this
     */
    public static function make($string, string $encoding = null): Utility
    {
        return new static($string, $encoding);
    }

    public function matches($pattern, &$matches = []): bool
    {
        return (bool)preg_match($pattern, $this->string, $matches);
    }

    /**
     * Minimise string, removing all extra spaces, new lines and any unneeded html content
     *
     * @return $this
     */
    public function minimise(): Utility
    {
        // remove redundant (white-space) characters
        $replace = [
            // remove tabs before and after HTML tags
            '/\>[^\S ]+/s' => '>',
            '/[^\S ]+\</s' => '<',
            // shorten multiple whitespace sequences; keep new-line characters because they matter in JS!!!
            '/([\t ])+/s' => ' ',
            // remove leading and trailing spaces
            '/^([\t ])+/m' => '',
            '/([\t ])+$/m' => '',
            // remove JS line comments (simple only);
            // do NOT remove lines containing URL (e.g. 'src="http://server.com/"')!!!
            '~//[a-zA-Z0-9 ]+$~m' => '',
            // remove empty lines (sequence of line-end and white-space characters)
            '/[\r\n]+([\t ]?[\r\n]+)+/s' => "\n",
            // remove empty lines (between HTML tags);
            // cannot remove just any line-end characters because in inline JS they can matter!
            '/\>[\r\n\t ]+\</s' => '><',
            // remove "empty" lines containing only JS's block end character;
            // join with next line (e.g. "}\n}\n</script>" --> "}}</script>"
            '/}[\r\n\t ]+/s' => '}',
            '/}[\r\n\t ]+,[\r\n\t ]+/s' => '},',
            // remove new-line after JS's function or condition start; join with next line
            '/\)[\r\n\t ]?{[\r\n\t ]+/s' => '){',
            '/,[\r\n\t ]?{[\r\n\t ]+/s' => ',{',
            // remove new-line after JS's line end (only most obvious and safe cases)
            '/\),[\r\n\t ]+/s' => '),',
            // remove quotes from HTML attributes that does not contain spaces; keep quotes around URLs!
            '~([\r\n\t ])?([a-zA-Z0-9]+)="([a-zA-Z0-9_/\\-]+)"([\r\n\t ])?~s' => '$1$2=$3$4',
            // $1 and $4 insert first white-space character found before/after attribute
            '!/\*[^*]*\*+([^/][^*]*\*+)*/!' => '',
            // Remove comments
        ];

        $string = preg_replace(array_keys($replace), array_values($replace), $this->string);

        $remove = ['</option>', '</li>', '</dt>', '</dd>', '</tr>', '</th>', '</td>'];

        // remove optional ending tags (see http://www.w3.org/TR/html5/syntax.html#syntax-tag-omission )
        $string = str_ireplace($remove, '', $string);
        // remove tabs
        $string = str_replace("\t", ' ', $string);
        // remove new lines
        $string = str_replace("\n", ' ', $string);
        // remove carriage returns
        $string = str_replace("\r", ' ', $string);

        $string = trim(preg_replace('/[\s\t\n\r\s]+/', ' ', $string));

        return new static($string, $this->encoding);
    }

    /**
     * Find all the positions of occurrences of the given needle in the string
     *
     * @param string $needle The value to find in the string
     *
     * @return array
     */
    public function occurrences(string $needle): array
    {
        $offset = 0;
        $allPositions = [];

        while (($position = strpos($this->string, $needle, $offset)) !== false) {
            $offset = $position + 1;
            $allPositions[] = $position;
        }

        return $allPositions;
    }

    /**
     * Pad the string with a value until it is the given length
     *
     * @param int $length Desired string length after padding
     * @param string $padding Value to pad the string with
     *
     * @return $this
     */
    public function pad(int $length, string $padding = ' '): Utility
    {
        $padLength = $length - $this->length();

        return $this->applyPadding(floor($padLength / 2), ceil($padLength / 2), $padding);
    }

    /**
     * Pad the left the string with a value until it is the given length
     *
     * @param int $length Desired string length after padding
     * @param string $padding Value to pad the string with
     *
     * @return $this
     */
    public function padLeft($length, $padding = ' '): Utility
    {
        return $this->applyPadding($length - $this->length(), 0, $padding);
    }

    /**
     * Pad the right the string with a value until it is the given length
     *
     * @param int $length Desired string length after padding
     * @param string $padding Value to pad the string with
     *
     * @return $this
     */
    public function padRight($length, $padding = ' '): Utility
    {
        return $this->applyPadding(0, $length - $this->length(), $padding);
    }

    /**
     * Transform user input into a collection of Utility
     *
     * @param string|array $parameters
     *
     * @return Utility[]
     */
    private function parameters($parameters): array
    {
        $values = (!is_array($parameters)) ? [$parameters] : $parameters;

        $strings = [];

        foreach ($values as $value) {
            $strings[] = self::make($value, $this->encoding);
        }

        return $strings;
    }

    /**
     * Clean up and chunk a string ready for use in casing the string value
     *
     * @param string $string
     *
     * @return array
     */
    private function prepareForCasing($string): array
    {
        $string = str_replace(['.', '_', '-'], ' ', $string);

        // split on capital letters
        $string = implode(' ', preg_split('/(?<=\\w)(?=[A-Z])/', $string));

        // explode on numbers
        $parts = preg_split('/(,?\s+)|((?<=[a-z])(?=\d))|((?<=\d)(?=[a-z]))/i', $string);

        // return only words
        return array_values(array_filter($parts, function ($value) {
            return !empty($value);
        }));
    }

    /**
     * Prepend the string with a given value
     *
     * @param string $prefix
     *
     * @return $this
     */
    public function prepend($prefix): Utility
    {
        return new static(new static($prefix, $this->encoding) . $this->string, $this->encoding);
    }

    /**
     * Remove part of the string
     *
     * @param string|array $remove Value(s) to remove
     *
     * @return $this
     */
    public function remove($remove): Utility
    {
        return $this->replace($remove, null);
    }

    /**
     * Remove words from the end of a string
     *
     * @param string $remove Word to remove
     *
     * @return $this
     */
    public function removeFromEnd(string $remove): Utility
    {
        if ($this->endsWith($remove)) {
            $length = strlen( $remove );
            if( !$length ) {
                return $this;
            }
            return new static(substr($this->string, 0, -strlen($remove)), $this->encoding);
        }

        return $this;
    }
    /**
     * Remove words from the end of a string
     *
     * @param string $remove Word to remove
     *
     * @return $this
     */
    public function removeFromStart(string $remove): Utility
    {
        if ($this->beginsWith($remove)) {
            $length = strlen( $remove );
            if( !$length ) {
                return $this;
            }
            return new static(substr($this->string, strlen($remove)), $this->encoding);
        }

        return $this;
    }

    /**
     * Remove punctuation from the string
     *
     * @return $this
     */
    public function removePunctuation(): Utility
    {
        $string = preg_replace('/[[:punct:]]/', '', $this->string);

        return new static($string, $this->encoding);
    }

    /**
     * Remove repeating characters from the value
     *
     * @param string $repeatingValue Value to remove
     *
     * @return $this
     */
    public function removeRepeating(string $repeatingValue = ' '): Utility
    {
        $string = preg_replace('{(' . preg_quote($repeatingValue) . ')\1+}', $repeatingValue, $this->string);

        return new static($string, $this->encoding);
    }

    /**
     * Remove all spaces and white space from the string
     *
     * @return $this
     */
    public function removeSpace(): Utility
    {
        $string = preg_replace('~[[:cntrl:][:space:]]~', '', trim($this->string));

        return new static($string, $this->encoding);
    }

    /**
     * Repeat the string by the amount of the multiplier
     *
     * @param int $multiplier The number of times to repeat the string
     *
     * @return $this
     */
    public function repeat(int $multiplier): Utility
    {
        $string = str_repeat($this->string, $multiplier);

        return new static($string, $this->encoding);
    }

    /**
     * Replace occurrences in the string with a given value
     *
     * @param string|array $find Value(s) in the string to replace
     * @param string $with Value to replace occurrences with
     *
     * @return $this
     */
    public function replace($find, $with): Utility
    {
        $replace = [];

        foreach ($this->parameters($find) as $parameter) {
            $replace[] = preg_quote($parameter->value());
        }

        $withString = new static($with, $this->encoding);

        $string = preg_replace('#(' . implode('|', $replace) . ')#', $withString->value(), $this->string);

        return new static($string, $this->encoding);
    }

    /**
     * Replace none alpha characters in the string with the given value
     *
     * @param string $replacement Value to replace none alpha characters with
     * @param boolean $strict Should spaces be preserved
     *
     * @return $this
     */
    public function replaceNonAlpha(string $replacement = '', bool $strict = false): Utility
    {
        if ($strict) {
            $pattern = '/[^a-zA-Z]/';
        } else {
            $pattern = '/[^a-zA-Z ]/';
        }

        $string = preg_replace($pattern, $replacement, trim($this->string));

        return new static($string, $this->encoding);
    }

    /**
     * Replace none alphanumeric characters in the string with the given value
     *
     * @param string $replacement Value to replace none alphanumeric characters with
     * @param boolean $strict Should spaces be preserved
     *
     * @return $this
     */
    public function replaceNonAlphanumeric(string $replacement = '', bool $strict = false): Utility
    {
        if ($strict) {
            $pattern = '/[^a-zA-Z0-9]/';
        } else {
            $pattern = '/[^a-zA-Z0-9 ]/';
        }

        $string = preg_replace($pattern, $replacement, trim($this->string));

        return new static($string, $this->encoding);
    }

    /**
     * Remove none letters and numbers with a given value
     *
     * @param string $replacement Value to replace none alphanumeric characters with
     * @param boolean $strict Should spaces be preserved
     *
     * @return $this
     */
    public function replaceNonNumeric(string $replacement = '', bool $strict = false): Utility
    {
        if ($strict) {
            $pattern = '/[^0-9]/';
        } else {
            $pattern = '/[^0-9 ]/';
        }

        $string = preg_replace($pattern, $replacement, trim($this->string));

        return new static($string, $this->encoding);
    }

    /**
     * Reverse the string
     *
     * @return $this
     */
    public function reverse(): Utility
    {
        $string = '';

        for ($i = $this->length() - 1; $i >= 0; $i--) {
            $string .= \mb_substr($this->string, $i, 1, $this->encoding);
        }

        return new static($string, $this->encoding);
    }

    /**
     * Set the strings encoding
     *
     * @param string $encoding
     *
     * @return $this
     */
    public function setEncoding(string $encoding): Utility
    {
        $this->encoding = trim($encoding);

        return $this;
    }

    /**
     * Create the substring from index specified by $start up to, but not including the index specified by $end.
     * If $end value is omitted, the rest of the string is used.
     * If $end is negative, it is computed from the end of the string.
     *
     * @param int $start Index position to start slice from
     * @param null|integer $end Optional index position to end slice on
     *
     * @return $this
     */
    public function slice(int $start, int $end = null): Utility
    {
        if ($end === null) {
            $length = $this->length();
        } elseif ($end >= 0 && $end <= $start) {
            return new static('', $this->encoding);
        } elseif ($end < 0) {
            $length = $this->length() + $end - $start;
        } else {
            $length = $end - $start;
        }

        return $this->substring($start, $length);
    }

    /**
     * Create substring from the string beginning at $start with a length of $end.
     * If $end value is omitted, the rest of the string is used.
     * If $end is negative, it is computed from the end of the string.
     *
     * @param int $start Index position to start substring from
     * @param null|integer $end [optional] index for length of substring
     *
     * @return $this
     */
    public function substring(int $start, int $end = null): Utility
    {
        $length = ($end === null) ? $this->length() : $end;

        $string = mb_substr($this->string, $start, $length, $this->encoding);

        return new static($string, $this->encoding);
    }

    /**
     * Wrap the the string with a value
     *
     * @param $with
     * @return Utility
     */
    public function surround($with): Utility
    {
        $surrounding = new static($with, $this->encoding);

        return new static(implode('', [$surrounding, $this->string, $surrounding]), $this->encoding);
    }

    /**
     * Sanitize a string to only contain letters
     *
     * @return $this
     */
    public function toAlpha(): Utility
    {
        return $this->replaceNonAlpha('', true);
    }

    /**
     * Transform the string to only contain letters and numbers
     *
     * @return $this
     */
    public function toAlphanumeric(): Utility
    {
        return $this->replaceNonAlphanumeric('', true);
    }

    /**
     *  Transform the value to into camelCase format
     *
     * @return $this
     */
    public function toCamelCase(): Utility
    {
        // separate existing joined words
        $string = preg_replace('/([a-z0-9])(?=[A-Z])/', '$1 ', $this->string);

        $words = preg_split('/[\W_]/', $string);

        $words = array_map(function ($word) {
            return ucfirst(strtolower($word));
        }, $words);

        $string = lcfirst(implode('', $words));

        return new static($string, $this->encoding);
    }

    /**
     * Transform the value to kebab-case format
     *
     * @return $this
     */
    public function toKebabCase(): Utility
    {
        $string = $this->toSlug('-');

        return new static(strtolower($string), $this->encoding);
    }

    /**
     * Transform the value to be all lowercase
     *
     * @return Utility
     */
    public function toLowercase(): Utility
    {
        return new static(strtolower($this->string), $this->encoding);
    }

    /**
     * Sanitize a string to only contain letters and numbers
     *
     * @return $this
     */
    public function toNumeric(): Utility
    {
        return $this->replaceNonNumeric('', true);
    }

    /**
     *  Transform the value to into PascalCase format
     *
     * @return $this
     */
    public function toPascalCase(): Utility
    {
        $string = ucfirst($this->toCamelCase()->value());

        return new static($string, $this->encoding);
    }

    /**
     * Turn the string into a sentence.
     *
     * @return $this
     */
    public function toSentence(): Utility
    {
        $sentences = preg_split(
            '/([^\.\!\?;]+[\.\!\?;"]+)/',
            $this->string,
            -1,
            PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE
        );

        $sentences = array_map(function ($sentence) {
            $sentence = trim($sentence);
            if (!ctype_upper($sentence[0])) {
                $sentence = ucfirst($sentence);
            }
            return $sentence;
        }, $sentences);

        $string = implode(' ', $sentences);

        if (preg_match('/[\p{P}]$/', $string)) {
            return new static($string, $this->encoding);
        }

        return (new static($string, $this->encoding))->ensureEndsWith('.');
    }

    /**
     *  Clean a string to only have alpha numeric characters,
     *  turn spaces into a separator slug
     *
     * @param string $separator Value to separate chunks with
     *
     * @return $this
     */
    public function toSlug(string $separator = '-'): Utility
    {
        $string = mb_convert_encoding($this->string, 'UTF-8', $this->encoding);
        $string = preg_replace('/[^\s\p{L}0-9\-' . $separator . ']/u', '', $string);
        $string = htmlentities($string, ENT_QUOTES, 'UTF-8');
        $string = preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', $string);
        $string = iconv(mb_detect_encoding($string,'UTF-8, ASCII, ISO-8859-1'), 'ASCII//TRANSLIT//IGNORE', $string);
        $string = html_entity_decode($string, ENT_QUOTES, 'UTF-8');
        $string = preg_replace('~[^0-9a-z]+~i', $separator, $string);
        $string = trim($string, $separator);
        $string = mb_strtolower($string);

        return new static($string, $this->encoding);
    }

    /**
     *  Same as toSlug but preserves UTF8 characters
     *
     * @param string $separator Value to separate chunks with
     *
     * @return $this
     */
    public function toSlugUtf8(string $separator = '-'): Utility
    {
        $string = mb_convert_encoding($this->string, 'UTF-8', $this->encoding);
        $string = preg_replace('/[^\s\p{L}0-9\-' . $separator . ']/u', '', $string);
        $string = preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', $string);
        $string = preg_replace('/[\s_\-]/', $separator, $string);
        $string = trim($string, $separator);
        $string = mb_strtolower($string, 'utf-8');
        return new static($string, $this->encoding);
    }

    /**
     * Transform the value to snake_case format
     *
     * @return $this
     */
    public function toSnakeCase(): Utility
    {
        $string = mb_ereg_replace('\B([A-Z])', '-\1', trim($this->string));

        $string = mb_strtolower($string, $this->encoding);

        $string = mb_ereg_replace('[-_\s]+', '_', $string);

        return new static($string, $this->encoding);
    }

    /**
     * Transform the value to StudlyCase format
     *
     * @return $this
     */
    public function toStudlyCase(): Utility
    {
        $string = implode(' ', $this->prepareForCasing($this->string));

        $string = str_replace(' ', '', ucwords($string));

        return new static($string, $this->encoding);
    }

    /**
     * Transform the value to into Title Case format
     *
     * @return $this
     */
    public function toTitleCase(): Utility
    {
        $words = explode(' ', $this->string);

        $string = mb_convert_case(implode(' ', $words), MB_CASE_TITLE, $this->encoding());

        return new static($string, $this->encoding);
    }

    /**
     * Transform the value to be all uppercase
     *
     * @return Utility
     */
    public function toUppercase(): Utility
    {
        return new static(strtoupper($this->string), $this->encoding);
    }

    /**
     * Trim a collection of values from the string using trim
     *
     * @param mixed $values Values to be trimmed from the string
     *
     * @return $this
     */
    public function trim($values = " \t\n\r\0\x0B"): Utility
    {
        $parameters = $this->parameters($values);

        $string = trim($this->string, implode('', $parameters));

        return new static($string, $this->encoding);
    }

    /**
     * Trim a collection of values from the string using rtrim
     *
     * @param mixed $values Values to be trimmed from the string
     *
     * @return $this
     */
    public function trimLeft($values = " \t\n\r\0\x0B"): Utility
    {
        $parameters = $this->parameters($values);

        $string = ltrim($this->string, implode('', $parameters));

        return new static($string, $this->encoding);
    }

    /**
     * Trim a collection of values from the string using ltrim
     *
     * @param mixed $values Values to be trimmed from the string
     *
     * @return $this
     */
    public function trimRight($values = " \t\n\r\0\x0B"): Utility
    {
        $parameters = $this->parameters($values);

        $string = rtrim($this->string, implode('', $parameters));

        return new static($string, $this->encoding);
    }

    /**
     * Return the value when casting to string
     *
     * @return string
     */
    public function value(): string
    {
        return $this->string;
    }
}
