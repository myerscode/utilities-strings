<?php

namespace Myerscode\Utilities\Strings;

use Override;
use Myerscode\Utilities\Strings\Exceptions\InvalidFormatArgumentException;
use Stringable;

use function mb_strlen;
use function mb_substr;

/**
 * Class Utility
 *
 * @package Myerscode\Utilities\Strings
 */
class Utility implements Stringable
{
    /**
     * The string encoding
     */
    private string $encoding;

    /**
     * Utility constructor.
     *
     * @param  null|string  $encoding
     */
    public function __construct(protected readonly string|Stringable|Utility $string = '', string $encoding = null)
    {
        $this->setEncoding($encoding ?: mb_internal_encoding());
    }

    /**
     * Create a new instance of the string utility
     *
     * @param  null|string  $encoding
     *
     */
    public static function make(string|Stringable|Utility $string, string $encoding = null): Utility
    {
        return new Utility($string, $encoding);
    }

    /**
     * Return the value when casting to string
     */
    #[Override]
    public function __toString(): string
    {
        return (string)$this->value();
    }

    /**
     * Append the string with a given value
     */
    public function append(string $postfix): Utility
    {
        return static::make($this->string . static::make($postfix, $this->encoding), $this->encoding);
    }

    /**
     * Get the character at a specific index
     */
    public function at(int $position): Utility
    {
        if ($position < 0) {
            return static::make('', $this->encoding);
        }

        return $this->substring($position, 1);
    }

    /**
     * Does string start with a given value(s).
     * You can pass a single string or an array of strings to look check for.
     */
    public function beginsWith(array|string|Utility $begins, bool $caseSensitive = false): bool
    {
        if (empty($begins)) {
            return false;
        }

        $parameters = $this->parameters($begins);

        foreach ($parameters as $parameter) {
            $beginning = $this->substring(0, strlen((string)$parameter));
            if ($caseSensitive) {
                if (strcmp($beginning, (string)$parameter) === 0) {
                    return true;
                }
            } elseif (strcasecmp($beginning, (string)$parameter) === 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * Remove tags and trim the string
     */
    public function clean(string $allowedTags = null): Utility
    {
        $string = strip_tags(trim($this->string), $allowedTags);

        return static::make($string, $this->encoding);
    }

    /**
     * Check if a string contains all the given values
     */
    public function containsAll(array|string|Utility $contains, int $offset = 0): bool
    {
        if (empty($contains)) {
            return false;
        }

        $parameters = $this->parameters($contains);


        if ($offset > $this->length()) {
            return false;
        }

        foreach ($parameters as $parameter) {
            if (!str_contains(substr($this->string, $offset), (string)$parameter->value())) {
                return false;
            }
        }

        return true;
    }

    /**
     * Check if a string contains any of the given values
     */
    public function containsAny(array|string|Utility $contains, int $offset = 0): bool
    {
        if (empty($contains)) {
            return false;
        }

        $parameters = $this->parameters($contains);

        if ($offset > $this->length()) {
            return false;
        }

        foreach ($parameters as $parameter) {
            if (str_contains(substr($this->string, $offset), (string)$parameter->value())) {
                return true;
            }
        }

        return false;
    }

    /**
     * Get the strings encoding
     */
    public function encoding(): string
    {
        return $this->encoding;
    }

    /**
     * Does string end with a given value(s).
     * You can pass a single string or an array of strings to look check for.
     */
    public function endsWith(array|string|Utility $ends, bool $caseSensitive = false): bool
    {
        if (empty($ends)) {
            return false;
        }

        $parameters = $this->parameters($ends);

        foreach ($parameters as $parameter) {
            $ending = $this->substring(strlen((string)$this->string) - strlen((string)$parameter));
            if ($caseSensitive) {
                if (strcmp($ending, (string)$parameter->value()) === 0) {
                    return true;
                }
            } elseif (strcasecmp($ending, (string)$parameter->value()) === 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * Ensure the string starts with a given value
     */
    public function ensureBeginsWith(string|Utility $ensure): static
    {
        if (!$this->beginsWith($ensure)) {
            return $this->prepend($ensure);
        }

        return $this;
    }

    /**
     * Ensure the string starts with a given value
     */
    public function ensureEndsWith(string|Utility $ensure): static
    {
        if (!$this->endsWith($ensure)) {
            return $this->append($ensure);
        }

        return $this;
    }

    /**
     * Compare with another string and see if they match
     */
    public function equals(string|Stringable|Utility $compareTo): bool
    {
        return ($this->string === $compareTo);
    }

    /**
     * Explode the string on a given
     */
    public function explode(string $delimiter, int $limit = PHP_INT_MAX): array
    {
        return array_slice(array_map('trim', array_filter(explode($delimiter, (string)$this->string, $limit))), 0);
    }

    /**
     * Get the first x characters from the string
     */
    public function first(int $count): Utility
    {
        if ($count < 0) {
            return static::make('', $this->encoding);
        }

        return $this->substring(0, $count);
    }

    /**
     * Inserts the given values into the chronological placeholders
     */
    public function format(array $replacements = []): Utility
    {
        $string = $this->string;

        foreach ($replacements as $index => $value) {
            if (!is_string($value) && !($value instanceof Stringable)) {
                $type = get_debug_type($value);
                throw new InvalidFormatArgumentException(
                    sprintf('Placeholder %s could not convert type %s to a string', $index, $type)
                );
            }

            $string = str_replace('{' . $index . '}', $value, $string);
        }

        return static::make($string, $this->encoding);
    }

    /**
     * Does a string to only contain letters
     */
    public function isAlpha(): bool
    {
        return (bool)preg_match('#^[a-z\s]*$#i', (string)$this->string);
    }

    /**
     * Does the string only contain letters and numbers
     */
    public function isAlphaNumeric(): bool
    {
        return (bool)preg_match('#^[a-z0-9\s]*$#i', (string)$this->string);
    }

    /**
     * Is the string in a valid email format
     */
    public function isEmail(): bool
    {
        return filter_var($this->string, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Check if a given value can be perceived as false.
     * Will only return false if the value "looks false-y" by being a value of "false", "0", "no", "off", ""
     */
    public function isFalse(): bool
    {
        return (
            $this->string == ''
            || (false === filter_var($this->string, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE))
        );
    }

    /**
     * Is the string valid json
     */
    public function isJson(): bool
    {
        json_decode($this->string);

        return (json_last_error() == JSON_ERROR_NONE);
    }

    /**
     * Does the string only contain letters and numbers
     */
    public function isNumeric(): bool
    {
        return (!empty($this->string) && preg_match('#^\d*$#i', (string)$this->string));
    }

    /**
     * Check if a given value can be perceived as true
     * Will on return true if the value "looks true-y"
     * "true", "1", "yes", "on", "ok"
     */
    public function isTrue(): bool
    {
        return (
            $this->string == 'ok'
            || (true === filter_var($this->string, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE))
        );
    }

    /**
     * The length of the string.
     */
    public function length(): int
    {
        return mb_strlen($this->string, $this->encoding());
    }

    /**
     * Limit the length of the string to a given value
     */
    public function limit(int $length): Utility
    {
        $string = $this->string;

        if ($this->length() > $length) {
            $string = substr($string, 0, $length);
        }

        return static::make($string, $this->encoding);
    }

    /**
     * Does the string match a given RegEx pattern
     */
    public function matches(string $pattern, array &$matches = []): bool
    {
        return (bool)preg_match($pattern, (string)$this->string, $matches);
    }

    /**
     * Minimise string, removing all extra spaces, new lines and any unneeded html content
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

        $string = trim((string)preg_replace('#[\s\t\n\r]+#', ' ', $string));

        return static::make($string, $this->encoding);
    }

    /**
     * Find all the positions of occurrences of the given needle in the string
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
     */
    public function pad(int $length, string $padding = ' '): Utility
    {
        $padLength = $length - $this->length();

        return $this->applyPadding(floor($padLength / 2), ceil($padLength / 2), $padding);
    }

    /**
     * Pad the left the string with a value until it is the given length
     */
    public function padLeft(int $length, string $padding = ' '): Utility
    {
        return $this->applyPadding($length - $this->length(), 0, $padding);
    }

    /**
     * Pad the right the string with a value until it is the given length
     */
    public function padRight(int $length, string $padding = ' '): Utility
    {
        return $this->applyPadding(0, $length - $this->length(), $padding);
    }

    /**
     * Prepend the string with a given value
     */
    public function prepend(string|Utility $prefix): Utility
    {
        return static::make(static::make($prefix, $this->encoding) . $this->string, $this->encoding);
    }

    /**
     * Remove part of the string
     */
    public function remove(array|string $remove): Utility
    {
        return $this->replace($remove, '');
    }

    /**
     * Remove words from the end of a string
     */
    public function removeFromEnd(string|Utility $remove): static
    {
        if ($this->endsWith($remove)) {
            $length = strlen((string)$remove);
            if ($length === 0) {
                return $this;
            }

            return static::make(substr($this->string, 0, -strlen((string)$remove)), $this->encoding);
        }

        return $this;
    }

    /**
     * Remove words from the end of a string
     */
    public function removeFromStart(string $remove): static
    {
        if ($this->beginsWith($remove)) {
            $length = strlen($remove);
            if ($length === 0) {
                return $this;
            }

            return static::make(substr($this->string, strlen($remove)), $this->encoding);
        }

        return $this;
    }

    /**
     * Remove punctuation from the string
     */
    public function removePunctuation(): Utility
    {
        $string = preg_replace('#[[:punct:]]#', '', $this->string);

        return static::make($string, $this->encoding);
    }

    /**
     * Remove repeating characters from the value
     */
    public function removeRepeating(string $repeatingValue = ' '): Utility
    {
        $string = preg_replace('{(' . preg_quote($repeatingValue) . ')\1+}', $repeatingValue, $this->string);

        return static::make($string, $this->encoding);
    }

    /**
     * Remove all spaces and white space from the string
     */
    public function removeSpace(): Utility
    {
        $string = preg_replace('#[[:cntrl:][:space:]]#', '', trim($this->string));

        return static::make($string, $this->encoding);
    }

    /**
     * Repeat the string by the amount of the multiplier
     */
    public function repeat(int $multiplier): Utility
    {
        $string = str_repeat($this->string, $multiplier);

        return static::make($string, $this->encoding);
    }

    /**
     * Replace occurrences in the string with a given value
     */
    public function replace(array|string $find, string $with): Utility
    {
        $replace = [];

        foreach ($this->parameters($find) as $utility) {
            $replace[] = preg_quote((string)$utility->value());
        }

        $static = static::make($with, $this->encoding);

        $string = preg_replace('#(' . implode('|', $replace) . ')#', $static->value(), $this->string);

        return static::make($string, $this->encoding);
    }

    /**
     * Replace none alpha characters in the string with the given value
     */
    public function replaceNonAlpha(string $replacement = '', bool $strict = false): Utility
    {
        $pattern = $strict ? '/[^a-zA-Z]/' : '/[^a-zA-Z ]/';

        $string = preg_replace($pattern, $replacement, trim($this->string));

        return static::make($string, $this->encoding);
    }

    /**
     * Replace none alphanumeric characters in the string with the given value
     */
    public function replaceNonAlphanumeric(string $replacement = '', bool $strict = false): Utility
    {
        $pattern = $strict ? '/[^a-zA-Z0-9]/' : '/[^a-zA-Z0-9 ]/';

        $string = preg_replace($pattern, $replacement, trim($this->string));

        return static::make($string, $this->encoding);
    }

    /**
     * Remove none letters and numbers with a given value
     */
    public function replaceNonNumeric(string $replacement = '', bool $strict = false): Utility
    {
        $pattern = $strict ? '/[^0-9]/' : '/[^0-9 ]/';

        $string = preg_replace($pattern, $replacement, trim($this->string));

        return static::make($string, $this->encoding);
    }

    /**
     * Reverse the string
     */
    public function reverse(): Utility
    {
        $string = '';

        for ($i = $this->length() - 1; $i >= 0; --$i) {
            $string .= mb_substr($this->string, $i, 1, $this->encoding);
        }

        return static::make($string, $this->encoding);
    }

    /**
     * Set the strings encoding
     *
     *
     */
    public function setEncoding(string $encoding): static
    {
        $this->encoding = trim($encoding);

        return $this;
    }

    /**
     * Create the substring from index specified by $start up to, but not including the index specified by $end.
     * If $end value is omitted, the rest of the string is used.
     * If $end is negative, it is computed from the end of the string.
     */
    public function slice(int $start, int $end = null): Utility
    {
        if ($end === null) {
            $length = $this->length();
        } elseif ($end >= 0 && $end <= $start) {
            return static::make('', $this->encoding);
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
     */
    public function substring(int $start, int $end = null): Utility
    {
        $length = $end ?? $this->length();

        $string = mb_substr($this->string, $start, $length, $this->encoding);

        return static::make($string, $this->encoding);
    }

    /**
     * Wrap the  string with a value
     */
    public function surround(string|Stringable|Utility $with): Utility
    {
        $utility = static::make($with, $this->encoding);

        return static::make(implode('', [$utility, $this->string, $utility]), $this->encoding);
    }

    /**
     * Sanitize a string to only contain letters
     */
    public function toAlpha(): Utility
    {
        return $this->replaceNonAlpha('', true);
    }

    /**
     * Transform the string to only contain letters and numbers
     */
    public function toAlphanumeric(): Utility
    {
        return $this->replaceNonAlphanumeric('', true);
    }

    /**
     *  Transform the value to into camelCase format
     */
    public function toCamelCase(): Utility
    {
        // separate existing joined words
        $string = preg_replace('#([a-z0-9])(?=[A-Z])#', '$1 ', $this->string);

        $words = preg_split('#[\W_]#', (string)$string);

        $words = array_map(static fn($word): string => ucfirst(strtolower($word)), $words);

        $string = lcfirst(implode('', $words));

        return static::make($string, $this->encoding);
    }

    /**
     * Transform the value to kebab-case format
     */
    public function toKebabCase(): Utility
    {
        $utility = $this->toSlug();

        return static::make(strtolower($utility), $this->encoding);
    }

    /**
     * Transform the value to be all lowercase
     */
    public function toLowercase(): Utility
    {
        return static::make(strtolower($this->string), $this->encoding);
    }

    /**
     * Sanitize a string to only contain letters and numbers
     */
    public function toNumeric(): Utility
    {
        return $this->replaceNonNumeric('', true);
    }

    /**
     *  Transform the value to into PascalCase format
     */
    public function toPascalCase(): Utility
    {
        $string = ucfirst($this->toCamelCase()->value());

        return static::make($string, $this->encoding);
    }

    /**
     * Turn the string into a sentence.
     */
    public function toSentence(): Utility
    {
        $sentences = preg_split(
            '#([^.!?;]+[.!?;"]+)#',
            (string)$this->string,
            -1,
            PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE
        );

        $sentences = array_map(static function ($sentence): string {
            $sentence = trim($sentence);
            if (!ctype_upper($sentence[0])) {
                return ucfirst($sentence);
            }

            return $sentence;
        }, $sentences);

        $string = implode(' ', $sentences);

        if (preg_match('#[\p{P}]$#', $string)) {
            return static::make($string, $this->encoding);
        }

        return (static::make($string, $this->encoding))->ensureEndsWith('.');
    }

    /**
     *  Clean a string to only have alpha numeric characters,
     *  turn spaces into a separator slug
     */
    public function toSlug(string $separator = '-'): Utility
    {
        $string = mb_convert_encoding($this->string, 'UTF-8', $this->encoding);
        $string = preg_replace('/[^\s\p{L}0-9\-' . $separator . ']/u', '', $string);
        $string = htmlentities((string)$string, ENT_QUOTES, 'UTF-8');
        $string = preg_replace('#&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);#i', '$1', $string);
        $string = iconv(mb_detect_encoding((string)$string, 'UTF-8, ASCII, ISO-8859-1'), 'ASCII//TRANSLIT//IGNORE', (string)$string);
        $string = html_entity_decode($string, ENT_QUOTES, 'UTF-8');
        $string = preg_replace('#[^0-9a-z]+#i', $separator, $string);
        $string = trim((string)$string, $separator);
        $string = mb_strtolower($string);

        return static::make($string, $this->encoding);
    }

    /**
     *  Same as toSlug but preserves UTF8 characters
     */
    public function toSlugUtf8(string $separator = '-'): Utility
    {
        $string = mb_convert_encoding($this->string, 'UTF-8', $this->encoding);
        $string = preg_replace('/[^\s\p{L}0-9\-' . $separator . ']/u', '', $string);
        $string = preg_replace('#&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);#i', '$1', $string);
        $string = preg_replace('#[\s_\-]#', $separator, $string);
        $string = trim((string)$string, $separator);
        $string = mb_strtolower($string, 'utf-8');

        return static::make($string, $this->encoding);
    }

    /**
     * Transform the value to snake_case format
     */
    public function toSnakeCase(): Utility
    {
        $string = mb_ereg_replace('\B([A-Z])', '-\1', trim($this->string));

        $string = mb_strtolower($string, $this->encoding);

        $string = mb_ereg_replace('[-_\s]+', '_', $string);

        return static::make($string, $this->encoding);
    }

    /**
     * Transform the value to StudlyCase format
     */
    public function toStudlyCase(): Utility
    {
        $string = implode(' ', $this->prepareForCasing($this->string));

        $string = str_replace(' ', '', ucwords($string));

        return static::make($string, $this->encoding);
    }

    /**
     * Transform the value to into Title Case format
     */
    public function toTitleCase(): Utility
    {
        $words = explode(' ', (string)$this->string);

        $string = mb_convert_case(implode(' ', $words), MB_CASE_TITLE, $this->encoding());

        return static::make($string, $this->encoding);
    }

    /**
     * Transform the value to be all uppercase
     */
    public function toUppercase(): Utility
    {
        return static::make(strtoupper($this->string), $this->encoding);
    }

    /**
     * Trim a collection of values from the string using trim
     */
    public function trim(array|string $values = " \t\n\r\0\x0B"): Utility
    {
        $parameters = $this->parameters($values);

        $string = trim($this->string, implode('', $parameters));

        return static::make($string, $this->encoding);
    }

    /**
     * Trim a collection of values from the string using rtrim
     */
    public function trimLeft(array|string $values = " \t\n\r\0\x0B"): Utility
    {
        $parameters = $this->parameters($values);

        $string = ltrim($this->string, implode('', $parameters));

        return static::make($string, $this->encoding);
    }

    /**
     * Trim a collection of values from the string using ltrim
     */
    public function trimRight(array|string $values = " \t\n\r\0\x0B"): Utility
    {
        $parameters = $this->parameters($values);

        $string = rtrim($this->string, implode('', $parameters));

        return static::make($string, $this->encoding);
    }

    /**
     * Return the value when casting to string
     */
    public function value(): string|Stringable
    {
        return $this->string;
    }

    /**
     * Adds the specified amount of left and right padding to the given string.
     * The default character used is a space.
     */
    protected function applyPadding(int $left = 0, int $right = 0, string $padding = ' '): Utility
    {
        $length = mb_strlen($padding, $this->encoding);

        $stringLength = $this->length();

        $paddedLength = $stringLength + $left + $right;
        if ($length === 0) {
            return $this;
        }

        if ($paddedLength <= $stringLength) {
            return $this;
        }

        $leftPadding = mb_substr(str_repeat($padding, ceil($left / $length)), 0, $left, $this->encoding);

        $rightPadding = mb_substr(str_repeat($padding, ceil($right / $length)), 0, $right, $this->encoding);

        $string = $leftPadding . $this->string . $rightPadding;

        return static::make($string, $this->encoding);
    }

    /**
     * Transform user input into a collection of Utility
     */
    private function parameters(array|string|Utility $parameters): array
    {
        $values = (is_array($parameters)) ? $parameters : [(string)$parameters];

        $strings = [];

        foreach ($values as $value) {
            $strings[] = self::make($value, $this->encoding);
        }

        return $strings;
    }

    /**
     * Clean up and chunk a string ready for use in casing the string value
     */
    private function prepareForCasing(string $string): array
    {
        $string = str_replace(['.', '_', '-'], ' ', $string);

        // split on capital letters
        $string = implode(' ', preg_split('#(?<=\w)(?=[A-Z])#', $string));

        // explode on numbers
        $parts = preg_split('#(,?\s+)|((?<=[a-z])(?=\d))|((?<=\d)(?=[a-z]))#i', $string);

        // return only words
        return array_values(array_filter($parts, static fn($value): bool => $value !== '' && $value !== '0'));
    }
}
