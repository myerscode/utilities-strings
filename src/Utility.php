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
     * Adds the specified amount of left and right padding to the given string.
     * The default character used is a space.
     *
     * @param  int $left Length of left padding
     * @param  int $right Length of right padding
     * @param  string $padding String used to pad the value
     * @return static String with padding applied
     */
    protected function applyPadding(int $left = 0, int $right = 0, $padding = ' ')
    {
        $length = \mb_strlen($padding, $this->encoding);

        $stringLength = $this->length();

        $paddedLength = $stringLength + $left + $right;

        if (!$length || $paddedLength <= $stringLength) {
            return $this;
        }

        $leftPadding = \mb_substr(str_repeat($padding, ceil($left / $length)), 0, $left, $this->encoding);

        $rightPadding = \mb_substr(str_repeat($padding, ceil($right / $length)), 0, $right, $this->encoding);

        $string = $leftPadding . $this->string . $rightPadding;

        return new static($string, $this->encoding);
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
     * Inserts the given values into the chronological placeholders
     *
     * @param mixed $replacements Collection of items to insert into the string
     * @return $this
     */
    public function format(...$replacements)
    {
        $string = $this->string;

        foreach ($replacements as $index => $value) {
            if (!is_scalar($value) || (is_object($value) && !method_exists($value, '__toString'))) {
                $type = is_object($value) ? get_class($value) : gettype($value);
                throw new InvalidFormatArgumentException(
                    sprintf("Placeholder %s could not convert type %s to a string", $index, $type)
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
    public function isAlpha()
    {
        return (bool)preg_match('/^[a-z\s]*$/i', $this->string);
    }

    /**
     * Does the string only contain letters and numbers
     *
     * @return bool
     */
    public function isAlphaNumeric()
    {
        return (bool)preg_match('/^[a-z0-9\s]*$/i', $this->string);
    }

    /**
     * Is the string in a valid email format
     *
     * @return bool
     */
    public function isEmail()
    {
        return filter_var($this->string, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Check if a given value can be perceived as false.
     * Will only return false if the value "looks false-y" by being a value of "false", "0", "no", "off", ""
     *
     * @return bool
     */
    public function isFalse()
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
    public function isJson()
    {
        json_decode($this->string);

        return (json_last_error() == JSON_ERROR_NONE);
    }

    /**
     * Check if a given value can be perceived as true
     * Will on return true if the value "looks true-y"
     * "true", "1", "yes", "on", "ok"
     *
     * @return bool
     */
    public function isTrue()
    {
        return (
            in_array($this->string, ['ok']) ||
            (true === filter_var($this->string, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE))
        );
    }

    /**
     * The length of the string.
     *
     * @return int The number of characters in the string
     */
    public function length()
    {
        return \mb_strlen($this->string, $this->encoding());
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
     * Minimise string, removing all extra spaces, new lines and any unneeded html content
     *
     * @return $this
     */
    public function minimise()
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
     * @return array
     */
    public function occurrences(string $needle)
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
     * @param  int $length Desired string length after padding
     * @param  string $padding Value to pad the string with
     * @return $this
     */
    public function pad(int $length, $padding = ' ')
    {
        $padLength = $length - $this->length();

        return $this->applyPadding(floor($padLength / 2), ceil($padLength / 2), $padding);
    }

    /**
     * Pad the left the string with a value until it is the given length
     *
     * @param  int $length Desired string length after padding
     * @param  string $padding Value to pad the string with
     * @return $this
     */
    public function padLeft($length, $padding = ' ')
    {
        return $this->applyPadding($length - $this->length(), 0, $padding);
    }

    /**
     * Pad the right the string with a value until it is the given length
     *
     * @param  int $length Desired string length after padding
     * @param  string $padding Value to pad the string with
     * @return $this
     */
    public function padRight($length, $padding = ' ')
    {
        return $this->applyPadding(0, $length - $this->length(), $padding);
    }

    /**
     * Clean up and chunk a string ready for use in casing the string value
     *
     * @param $string
     * @return array
     */
    private function prepareForCasing($string)
    {
        $string = str_replace(['.', '_', '-'], ' ', $string);

        // split on capital letters
        $string = implode(' ', preg_split('/(?<=\\w)(?=[A-Z])/', $string));

        // explode on numbers
        $parts = preg_split("/(,?\s+)|((?<=[a-z])(?=\d))|((?<=\d)(?=[a-z]))/i", $string);

        // return only words
        return array_values(array_filter($parts, function ($value) {
            return !empty($value);
        }));
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
     * Remove part of the string
     *
     * @param string|array $remove Value(s) to remove
     * @return $this
     */
    public function remove($remove)
    {
        return $this->replace($remove, null);
    }

    /**
     * Remove punctuation from the string
     *
     * @return $this
     */
    public function removePunctuation()
    {
        $string = preg_replace('/[[:punct:]]/', "", $this->string);

        return new static($string, $this->encoding);
    }

    /**
     * Remove repeating characters from the value
     *
     * @param string $repeatingValue Value to remove
     * @return $this
     */
    public function removeRepeating(string $repeatingValue = ' ')
    {
        $string = preg_replace('{(' . preg_quote($repeatingValue) . ')\1+}', $repeatingValue, $this->string);

        return new static($string, $this->encoding);
    }

    /**
     * Remove all spaces and white space from the string
     *
     * @return $this
     */
    public function removeSpace()
    {
        $string = preg_replace('~[[:cntrl:][:space:]]~', '', trim($this->string));

        return new static($string, $this->encoding);
    }

    /**
     * Repeat the string by the amount of the multiplier
     *
     * @param  int $multiplier The number of times to repeat the string
     * @return $this
     */
    public function repeat(int $multiplier)
    {
        $string = str_repeat($this->string, $multiplier);

        return new static($string, $this->encoding);
    }

    /**
     * Replace occurrences in the string with a given value
     *
     * @param string|array $replace Value(s) in the string to replace
     * @param string $with Value to replace occurrences with
     * @return $this
     */
    public function replace($replace, $with)
    {
        if (!is_array($replace)) {
            $replace = [$replace];
        }

        $withString = new static($with, $this->encoding);

        $string = preg_replace('#(' . implode('|', $replace) . ')#', $withString->value(), $this->string);

        return new static($string, $this->encoding);
    }

    /**
     * Replace none alpha characters in the string with the given value
     *
     * @param string $replacement Value to replace none alphanumeric characters with
     * @param boolean $strict Should spaces be stripped
     * @return $this
     */
    public function replaceNonAlpha(string $replacement = '', bool $strict = false)
    {
        if ($strict) {
            $pattern = "/[^a-zA-Z]/";
        } else {
            $pattern = "/[^a-zA-Z ]/";
        }

        $string = preg_replace($pattern, $replacement, trim($this->string));

        return new static($string, $this->encoding);
    }

    /**
     * Replace none alphanumeric characters in the string with the given value
     *
     * @param string $replacement Value to replace none alphanumeric characters with
     * @param boolean $strict Should spaces be stripped
     * @return $this
     */
    public function replaceNonAlphanumeric(string $replacement = '', bool $strict = false)
    {
        if ($strict) {
            $pattern = "/[^a-zA-Z0-9]/";
        } else {
            $pattern = "/[^a-zA-Z0-9 ]/";
        }

        $string = preg_replace($pattern, $replacement, trim($this->string));

        return new static($string, $this->encoding);
    }

    /**
     * Remove none letters and numbers with a given value
     *
     * @param string $turnTo
     * @param boolean $strict
     * @return $this
     */
    public function replaceNonNumeric($turnTo = '', bool $strict = false)
    {
        if ($strict) {
            $pattern = "/[^0-9]/";
        } else {
            $pattern = "/[^0-9 ]/";
        }

        $string = preg_replace($pattern, $turnTo, trim($this->string));

        return new static($string, $this->encoding);
    }

    /**
     * Reverse the string
     *
     * @return $this
     */
    public function reverse()
    {
        $string = '';

        for ($i = $this->length() - 1; $i >= 0; $i--) {
            $string .= \mb_substr($this->string, $i, 1, $this->encoding);
        }

        return new static($string, $this->encoding);
    }

    /**
     * Create the substring from index specified by $start up to, but not including the index specified by $end.
     * If $end value is omitted, the rest of the string is used.
     * If $end is negative, it is computed from the end of the string.
     *
     * @param  int $start Index position to start slice from
     * @param  int $end Optional index position to end slice on
     * @return $this
     */
    public function slice(int $start, int $end = null)
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
     * @param  int $start Index position to start substring from
     * @param  int $end [optional] index for length of substring
     * @return $this
     */
    public function substring(int $start, int $end = null)
    {
        $length = ($end === null) ? $this->length() : $end;

        $string = mb_substr($this->string, $start, $length, $this->encoding);

        return new static($string, $this->encoding);
    }

    /**
     * Sanitize a string to only contain letters
     *
     * @return $this
     */
    public function toAlpha()
    {
        return $this->replaceNonAlpha('', true);
    }

    /**
     * Transform the string to only contain letters and numbers
     *
     * @return $this
     */
    public function toAlphanumeric()
    {
        return $this->replaceNonAlphanumeric('', true);
    }

    /**
     *  Transform the value to into camelCase format
     *
     * @return $this
     */
    public function toCamelCase()
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
    public function toKebabCase()
    {
        $string = $this->toSlug('-');

        return new static(strtolower($string), $this->encoding);
    }

    /**
     * Sanitize a string to only contain letters and numbers
     *
     * @return $this
     */
    public function toNumeric()
    {
        return $this->replaceNonNumeric('', true);
    }

    /**
     *  Transform the value to into PascalCase format
     *
     * @return $this
     */
    public function toPascalCase()
    {
        $string = ucfirst($this->toCamelCase()->value());

        return new static($string, $this->encoding);
    }

    /**
     * Turn the string into a sentence.
     *
     * @return $this
     */
    public function toSentence()
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

        return (new static($string, $this->encoding))->ensureEndsWith('.');
    }

    /**
     *  Clean a string to only have alpha numeric characters,
     *  turn spaces into a separator slug
     *
     * @param string $separator
     * @return $this
     */
    public function toSlug($separator = '-')
    {
        //Make alphanumeric (removes all other characters)
        $string = preg_replace('/[^A-Za-z0-9_\s-]/', '', $this->string);
        // translate fancy chars
        $string = iconv('utf-8', 'ASCII//TRANSLIT', $string);
        //Lower case everything
        $string = strtolower($string);
        //Clean up multiple dashes or whitespaces
        $string = preg_replace('/[\s-]+/', ' ', $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace('/[\s_]/', $separator, $string);

        return new static($string, $this->encoding);
    }

    /**
     * Transform the value to snake_case format
     *
     * @return $this
     */
    public function toSnakeCase()
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
    public function toStudlyCase()
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
    public function toTitleCase()
    {
        $words = explode(' ', $this->string);

        $string = mb_convert_case(implode(' ', $words), MB_CASE_TITLE, $this->encoding());

        return new static($string, $this->encoding);
    }

    /**
     * Trim a collection of values from the string using trim
     *
     * @param $values
     *
     * @return $this
     */
    public function trim($values = " \t\n\r\0\x0B")
    {
        $trim = (!is_array($values)) ? (array)$values : $values;

        $charList = implode('', $trim);

        $string = trim($this->string, $charList);

        return new static($string, $this->encoding);
    }

    /**
     * Trim a collection of values from the string using rtrim
     *
     * @param $values
     *
     * @return $this
     */
    public function trimLeft($values = " \t\n\r\0\x0B")
    {
        $trim = (!is_array($values)) ? (array)$values : $values;

        $charList = implode('', $trim);

        $this->string = ltrim($this->string, $charList);

        return $this;
    }

    /**
     * Trim a collection of values from the string using ltrim
     *
     * @param $values
     *
     * @return $this
     */
    public function trimRight($values = " \t\n\r\0\x0B")
    {
        $trim = (!is_array($values)) ? (array)$values : $values;

        $charList = implode('', $trim);

        $this->string = rtrim($this->string, $charList);

        return $this;
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
