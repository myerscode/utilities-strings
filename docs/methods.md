# Methods

## Available Methods

| Method | Returns | Description |
| --- | --- | --- |
| [after](#after-utility) | `Utility` | Remainder of the string after the first occurrence of a value |
| [afterLast](#afterlast-utility) | `Utility` | Remainder of the string after the last occurrence of a value |
| [append](#append-utility) | `Utility` | Append a value to the string |
| [at](#at-string) | `Utility` | Get the character at a specific index |
| [before](#before-utility) | `Utility` | Portion of the string before the first occurrence of a value |
| [beforeLast](#beforelast-utility) | `Utility` | Portion of the string before the last occurrence of a value |
| [beginsWith](#beginswith-bool) | `bool` | Does the string begin with a given value |
| [between](#between-utility) | `Utility` | Portion of the string between two values |
| [chars](#chars-array) | `array` | Get the string as an array of characters |
| [clean](#clean-utility) | `Utility` | Trim and strip tags from the string |
| [contains](#contains-bool) | `bool` | Does the string contain a value |
| [containsAll](#containsall-bool) | `bool` | Does the string contain all of the given values |
| [containsAny](#containsany-bool) | `bool` | Does the string contain any of the given values |
| [endsWith](#endswith-bool) | `bool` | Does the string end with any of the given values |
| [ensureBeginsWith](#ensurebeingswith-utility) | `Utility` | Prepend a value unless the string already begins with it |
| [ensureEndsWith](#ensureendswith-utility) | `Utility` | Append a value unless the string already ends with it |
| [equals](#equals-bool) | `bool` | Compare the string with another |
| [explode](#explode-array) | `array` | Explode the string by a delimiter |
| [format](#format-bool) | `Utility` | Replace placeholders with the given values in order |
| [isAlpha](#isalpha-bool) | `bool` | Does the string only contain alpha characters |
| [isAlphaNumeric](#isalphanumeric-bool) | `bool` | Does the string only contain alphanumeric characters |
| [isEmail](#isemail-bool) | `bool` | Is the string in an email format |
| [isEmpty](#isempty-bool) | `bool` | Is the string empty |
| [isFalse](#isfalse-bool) | `bool` | Does the string represent a false-y value |
| [isJson](#isjson-bool) | `bool` | Is the string valid JSON |
| [isNotEmpty](#isnotempty-bool) | `bool` | Is the string not empty |
| [isNumeric](#isnumeric-bool) | `bool` | Does the string only contain numeric characters |
| [isTrue](#istrue-bool) | `bool` | Does the string represent a true-y value |
| [last](#last-utility) | `Utility` | Get the last x characters of the string |
| [lcfirst](#lcfirst-utility) | `Utility` | Convert the first character to lowercase |
| [length](#length-int) | `int` | Get the length of the string |
| [limit](#limit-utility) | `Utility` | Limit the length of the string |
| [matches](#match-bool) | `bool` | Does the string match a regular expression |
| [minimise](#minimise-utility) | `Utility` | Remove spaces and unnecessary html |
| [occurrences](#occurrences-array) | `array` | Starting positions of all occurrences of a value |
| [pad](#pad-utility) | `Utility` | Pad both sides of the string to a given length |
| [padLeft](#padleft-utility) | `Utility` | Pad the left of the string to a given length |
| [padRight](#padright-utility) | `Utility` | Pad the right of the string to a given length |
| [prepend](#prepend-utility) | `Utility` | Prepend a value to the string |
| [remove](#remove-utility) | `Utility` | Remove occurrences of a value from the string |
| [removeFromEnd](#removefromend-utility) | `Utility` | Remove a word from the end of the string |
| [removeFromStart](#removefromstart-utility) | `Utility` | Remove a word from the start of the string |
| [removePunctuation](#removepunctuation-utility) | `Utility` | Strip punctuation characters |
| [removeRepeating](#removerepeating-utility) | `Utility` | Collapse repeating characters |
| [removeSpace](#removespace-utility) | `Utility` | Strip all space characters |
| [repeat](#repeat-utility) | `Utility` | Repeat the string a number of times |
| [replace](#replace-utility) | `Utility` | Replace all occurrences of values |
| [replaceFirst](#replacefirst-utility) | `Utility` | Replace the first occurrence of a value |
| [replaceLast](#replacelast-utility) | `Utility` | Replace the last occurrence of a value |
| [replaceNonAlpha](#replacenonalpha-utility) | `Utility` | Replace non alpha characters |
| [replaceNonAlphanumeric](#replacenonalphanumeric-utility) | `Utility` | Replace non alphanumeric characters |
| [replaceNonNumeric](#replacenonnumeric-utility) | `Utility` | Replace non numeric characters |
| [reverse](#reverse-utility) | `Utility` | Reverse the string |
| [slice](#slice-utility) | `Utility` | Create a slice of the string |
| [squish](#squish-utility) | `Utility` | Collapse whitespace runs to a single space and trim |
| [substring](#substring-utility) | `Utility` | Create a substring of the string |
| [substringCount](#substringcount-int) | `int` | Count occurrences of a value in the string |
| [surround](#surround-utility) | `Utility` | Wrap the string with another string |
| [swap](#swap-utility) | `Utility` | Swap multiple keywords using a key/value map |
| [swapCase](#swapcase-utility) | `Utility` | Swap the case of each character |
| [toAlpha](#toalpha-utility) | `Utility` | Convert to only alpha characters |
| [toAlphanumeric](#toalphanumeric-utility) | `Utility` | Convert to only alphanumeric characters |
| [toCamelCase](#tocamelcase-utility) | `Utility` | Convert to camelCase |
| [toKebabCase](#tokebabcase-utility) | `Utility` | Convert to kebab-case |
| [toLowercase](#tolowercase-utility) | `Utility` | Convert to lowercase |
| [toNumeric](#tonumeric-utility) | `Utility` | Convert to only numeric characters |
| [toPascalCase](#topascalcase-utility) | `Utility` | Convert to PascalCase |
| [toSentence](#tosentencecase-utility) | `Utility` | Convert to sentence case |
| [toSlug](#toslug-utility) | `Utility` | Convert to a URL slug |
| [toSlugUtf8](#toslugutf8-utility) | `Utility` | Convert to a slug preserving UTF-8 characters |
| [toSnakeCase](#tosnakecase-utility) | `Utility` | Convert to snake_case |
| [toStudlyCase](#tostudlycase-utility) | `Utility` | Convert to StudlyCase |
| [toTitleCase](#totitlecase-utility) | `Utility` | Convert to Title Case |
| [toUppercase](#touppercase-utility) | `Utility` | Convert to uppercase |
| [ucfirst](#ucfirst-utility) | `Utility` | Convert the first character to uppercase |
| [trim](#trim-utility) | `Utility` | Trim values from both ends of the string |
| [trimLeft](#trimleft-utility) | `Utility` | Trim values from the left of the string |
| [trimRight](#trimright-utility) | `Utility` | Trim values from the right of the string |
| [value](#value-utility) | `Utility` | Get the current value of the string |
| [wordCount](#wordcount-int) | `int` | Count the number of words in the string |
| [wrap](#wrap-utility) | `Utility` | Wrap the string with a start and optional end value |

## Method Reference

### after `Utility`
Get the remainder of the string after the first occurrence of a given value

```php
$str = new Utility('Hello World');

echo $str->after('Hello ');
// World

echo $str->after('xyz');
// (empty string)

echo $str->after('');
// Hello World
```

### afterLast `Utility`
Get the remainder of the string after the last occurrence of a given value

```php
$str = new Utility('foo.bar.baz');

echo $str->afterLast('.');
// baz

echo $str->afterLast('xyz');
// (empty string)

echo $str->afterLast('');
// foo.bar.baz
```

### append `Utility`
Append a value to the string

```php
$str = new Utility('Hello World');

echo $str->append('!');
// Hello World!
```

### at `string`
Get the character at a specific index

```php
$str = new Utility('Hello World');

echo $str->at(6);
// W
```

### before `Utility`
Get the portion of the string before the first occurrence of a given value

```php
$str = new Utility('Hello World');

echo $str->before(' World');
// Hello

echo $str->before('xyz');
// (empty string)

echo $str->before('');
// Hello World
```

### beforeLast `Utility`
Get the portion of the string before the last occurrence of a given value

```php
$str = new Utility('foo.bar.baz');

echo $str->beforeLast('.');
// foo.bar

echo $str->beforeLast('xyz');
// (empty string)

echo $str->beforeLast('');
// foo.bar.baz
```

### beginsWith `bool`
BeginsWith defaults to case insensitive checks.

```php
$str = new Utility('Hello World');

echo $str->beginsWith('hello');
// true

echo $str->beginsWith('hello', true);
// false
```

### between `Utility`
Get the portion of the string between two given values

```php
$str = new Utility('Hello World!');

echo $str->between('Hello ', '!');
// World

$str = new Utility('key=value&other');

echo $str->between('=', '&');
// value
```

### chars `array`
Get the string as an array of its individual characters. Multibyte aware.

```php
$str = new Utility('foo');

echo $str->chars();
// ['f', 'o', 'o']

$str = new Utility('');

echo $str->chars();
// []

$str = new Utility('fòôbàř');

echo $str->chars();
// ['f', 'ò', 'ô', 'b', 'à', 'ř']
```

### clean `Utility`
Clean will do a basic `trim` and `strip_tags` calls on the string.

You can pass an optional `$allowable_tags` parameter to do define tags that the underlying `strip_tags` will preserve.

```php
$str = new Utility('<p>Hello <strong>World</strong></p>');

echo $str->clean();
// Hello World

echo $str->beginsWith('<p>Hello <strong>World</strong></p>', '<p>');
// <p>Hello World</p>
```

### contains `bool`
Check if the string contains a given value.

Has an optional `$offset` parameter to change where the string starts looking from.

```php
$str = new Utility('Hello World');

echo $str->contains('World');
// true

echo $str->contains('xyz');
// false

echo $str->contains('World', 10);
// false
```

### containsAll `bool`
Will check if the string contains ALL the passed values.

Has an optional `$offset` parameter to change where the string starts looking from.


```php
$str = new Utility('Hello World. Foo Bar')

echo $str->containsAll('Foo');
// true

echo $str->containsAll('Food');
// false

echo $str->containsAll(['Foo', 'Bar']);
// true

echo $str->containsAll(['Food', 'Bar']);
// false

echo $str->containsAll(['Hello', 'Bar']);
// true

echo $str->containsAll(['Hello', 'World'], 20);
// false
```

### containsAny `bool`
Will check if the string contains ANY of the passed values. The method turns as soon as one value is found.

Has an optional `$offset` parameter to change where the string starts looking from.

```php
$str = new Utility('Hello World. Foo Bar')

echo $str->containsAny('Foo');
// true

echo $str->containsAny('Food');
// false

echo $str->containsAny(['Food', 'Bar']);
// true

echo $str->containsAny(['Hello', 'World'], 20);
// false
```

### endsWith `bool`
Check to see if the string ends with any of the given values

Has an optional `$strict` parameter to use case sensitivity or not, defaults to false.

```php
$str = new Utility('Hello World. Foo Bar')

echo $str->endsWith('Foo');
// false

echo $str->endsWith('Bar');
// true

echo $str->endsWith(['Hello World', 'Foo Bar']);
// true

echo $str->endsWith(['Hello World', 'Foo']);
// false
```

### ensureBeingsWith `Utility`
Check if the string beings with the given value, if not prepends it.

```php
$str = new Utility('Foo Bar')

echo $str->ensureBeingsWith('Foo');
// Foo Bar

echo $str->ensureBeingsWith('Hello ');
// Hello Foo Bar
```

### ensureEndsWith `Utility`
Check if the string ends with the given value, if not appends it.

```php
$str = new Utility('Foo Bar')

echo $str->ensureEndsWith('Bar');
// Foo Bar

echo $str->ensureEndsWith(' World');
// Foo Bar World
```

### equals `bool`
Compare the string with another
```php
$str = new Utility('Foo Bar')

echo $str->equals('Foo Bar');
// true

echo $str->ensureEndsWith('foo bar');
// false
```

### explode `array`
Explode the string by a delimiter, trimming and removing any empty values from the results
```php
$str = new Utility('Foo, Bar');
echo $str->explode(',');
// ['Foo', 'Bar']

$str = new Utility('Foo,,,,Bar');
echo $str->explode(',');
// ['Foo', 'Bar']
```

### format `bool`
Replace placeholders with the given values in order

```php
$str = new Utility('Hello {0} Foo {1}')

echo $str->format('World', 'Bar);
// Hello World Foo Bar

$str = new Utility('{0} {1} {0} {1} {0} {1}')
echo $str->format('Foo', 'Bar');
// Foo Bar Foo Bar Foo Bar 
```

### isAlphanumeric `bool`
Check if the string only contains alphanumeric characters

```php
$str = new Utility('Foo Bar 123')

echo $str->isAlphanumeric();
// true

$str = new Utility('Foo Bar!!!')

echo $str->isAlphanumeric();
// false
```

### isAlpha `bool`
Check if the string only contains alpha characters

```php
$str = new Utility('FooBar')

echo $str->isAlpha();
// true

$str = new Utility('Foo Bar!!!')

echo $str->isAlpha();
// false
```

### isEmail `bool`
Check if the string is in an email format

```php
$str = new Utility('foo@bar.com')

echo $str->isEmail();
// true

$str = new Utility('@world com')

echo $str->isEmail();
// false
```

### isEmpty `bool`
Check if the string is empty

```php
$str = new Utility('')

echo $str->isEmpty();
// true

$str = new Utility('hello')

echo $str->isEmpty();
// false

$str = new Utility(' ')

echo $str->isEmpty();
// false
```

### isFalse `bool`
Check if the string could be assumed to represent a false value ("false", "0", "no", "off", "")

```php
$str = new Utility('false')

echo $str->isFalse();
// true

$str = new Utility('true')

echo $str->isFalse();
// false
```

### isJson `bool`
Check if the string is valid JSON

```php
$str = new Utility('{ "foo":"bar", "hello":"world" }')

echo $str->isJson();
// true

$str = new Utility('"foo":"bar", "hello":"world"')

echo $str->isJson();
// false
```

### isNumeric `bool`
Check if the string contains no spaces or separators and only numeric characters

```php
$str = new Utility('123')

echo $str->isNumeric();
// true

$str = new Utility('77 49')

echo $str->isNumeric();
// false

$str = new Utility('77.49')

echo $str->isNumeric();
// false
```

### isNotEmpty `bool`
Check if the string is not empty

```php
$str = new Utility('hello')

echo $str->isNotEmpty();
// true

$str = new Utility('')

echo $str->isNotEmpty();
// false
```

### isTrue `bool`
Check if the string could be assumed to represent a true value ("true", "1", "yes", "on", "ok")

```php
$str = new Utility('true')

echo $str->isTrue();
// true

$str = new Utility('false')

echo $str->isTrue();
// false
```

### last `Utility`
Get the last x characters from the string

```php
$str = new Utility('Hello World')

echo $str->last(5);
// World

echo $str->last(0);
// (empty string)

echo $str->last(50);
// Hello World
```

### lcfirst `Utility`
Convert the first character of the string to lowercase. Multibyte aware.

```php
$str = new Utility('Foo Bar')

echo $str->lcfirst();
// foo Bar

$str = new Utility('Hello')

echo $str->lcfirst();
// hello
```

### length `int`
Get the length of the string

```php
$str = new Utility('hello world')

echo $str->length();
// 11
```

### limit `Utility`
Limit the length of the string to a given value

```php
$str = new Utility('Hello World')

echo $str->limit(5);
// Hello
```

### match `bool`
Check if the string matches a regular expression pattern

```php
$str = new Utility('Hello=World')

echo $str->matches('/(.+)=(.+)/');
// true

echo $str->matches('/^[a-z\s]*$/i');
// false
```

### minimise `Utility`
Minimise the string removing all spaces and all unnecessary html attributes

```php
$str = new Utility('foo           <select><option>bar</option></select>')

echo $str->length();
// foo <select><option>foobar</select>
```

### occurrences `array`
Find the starting positions for all occurrences of a given value in the string

```php
$str = new Utility('hello world. foo bar. food. foo bar. hello world.')

echo $str->occurrences('foo');
// [13, 22, 28]
```

### padLeft `Utility`
Repeat a value on the left of the string, until it reaches a given length

```php
$str = new Utility('foo')

echo $str->padLeft('!', 6);
// !!!foo
```

### padRight `Utility`
Repeat a value on the right of the string, until it reaches a given length

```php
$str = new Utility('foo')

echo $str->padRight('!', 6);
// foo!!!
```

### pad `Utility`
Repeat a value on both sides of the string, until it reaches a given length

```php
$str = new Utility('foo')

echo $str->pad('!*', 7);
// !*foo!*

// !foo!!
echo $str->pad('.', 6);
// .foo..
```

### prepend `Utility`
Prepend a value to the string

```php
$str = new Utility('World')

echo $str->prepend('Hello ');

// Hello World
```

### removePunctuation `Utility`
Strip the string of any punctuation characters

```php
$str = new Utility('Hello, World! It\'s a lovley day.')

echo $str->removePunctuation();

// Hello World Its a lovley day
```

### removeRepeating `Utility`
Strip the string of any repeating characters

```php
$str = new Utility('Foo        Bar')

echo $str->removeRepeating(' ');
// Foo Bar

$str = new Utility('Hello World!!!!!!!!')

echo $str->removeRepeating('!');
// Hello World!
```

### removeSpace `Utility`
Strip the string of any space characters

```php
$str = new Utility('Foo        Bar. Hello World')

echo $str->removeSpace();
// FooBar.HelloWorld
```

### remove `Utility`
Remove occurrences of a given value from the string

```php
$str = new Utility('Foo Bar. Hello World')

echo $str->remove('o');
// F Bar Hell Wrld
```

### removeFromStart `Utility`
Remove word from the start of the string

```php
$str = new Utility('thethe quick brown fox')

echo $str->removeFromStart('the');
// the quick brown fox
```

### removeFromEnd `Utility`
Remove word from the end of the string

```php
$str = new Utility('the quick brown foxfox')

echo $str->removeFromStart('fox');
// the quick brown fox
```

### repeat `Utility`
Repeat the string the amount of times specified

```php
$str = new Utility('Foo Bar.')

echo $str->repeat(4);
// Foo Bar.Foo Bar.Foo Bar.Foo Bar.
```

### replaceNonAlphanumeric `Utility`
Replace non alphanumeric values with a give value

Has an optional `$strict` parameter to preserve spaces or not, defaults to `false`

```php
$str = new Utility('Foo Bar.')

echo $str->replaceNonAlphanumeric('');
// Foo Bar

echo $str->replaceNonAlphanumeric('', true);
// FooBar
```

### replaceNonAlpha `Utility`
Replace non alpha values with a give value

Has an optional `$strict` parameter to preserve spaces or not, defaults to `false`

```php
$str = new Utility('Foo Bar. 123')

echo $str->replaceNonAlpha('');
// Foo Bar

echo $str->replaceNonAlpha('', true);
// FooBar
```

### replaceNonNumeric `Utility`
Replace non numeric values with a give value

Has an optional `$strict` parameter to preserve spaces or not, defaults to `false`

```php
$str = new Utility('Foo Bar. 123')

echo $str->replaceNonNumeric('');
//   123

echo $str->replaceNonNumeric('', true);
// 123
```

### replace `Utility`
Replace all occurrences of values from the string with another value

```php
$str = new Utility('Foo Bar. 123')

echo $str->replace('123', '!!!');
// Foo Bar.

echo $str->replace(['Foo', 'Bar'], '');
// .123
```

### replaceFirst `Utility`
Replace the first occurrence of a value in the string

```php
$str = new Utility('foo bar foo')

echo $str->replaceFirst('foo', 'baz');
// baz bar foo

echo $str->replaceFirst('xyz', 'baz');
// foo bar foo
```

### replaceLast `Utility`
Replace the last occurrence of a value in the string

```php
$str = new Utility('foo bar foo')

echo $str->replaceLast('foo', 'baz');
// foo bar baz

echo $str->replaceLast('xyz', 'baz');
// foo bar foo
```

### reverse `Utility`
Reverse the string

```php
$str = new Utility('foobar')

echo $str->reverse();
// raboof
```

### slice `Utility`
Create a slice of the string, starting at the index stated `$start` property for a length of the `$end` property

```php
$str = new Utility('foobar')

echo $str->slice(0,3);
// foo
```

### squish `Utility`
Collapse all runs of whitespace (spaces, tabs and newlines) into a single space and trim the ends.

```php
$str = new Utility('foo    bar')

echo $str->squish();
// foo bar

$str = new Utility("  foo \t\n bar  ")

echo $str->squish();
// foo bar
```

### substring `Utility`
Create a substring value of the string, starting at the index stated by `$start` property and up to and including index specified by `$end` property

If no `$end` value is provided, the rest of the string length is used

If a negative number is used for `$end`, it is calculated form the end of the string

```php
$str = new Utility('foobar')

echo $str->slice(0,3);
// foo

$str = new Utility('foobar')

echo $str->slice(3);
// bar

$str = new Utility('foobar')

echo $str->slice(0,-3);
// foo
```

### substringCount `int`
Count the number of non-overlapping occurrences of a value in the string. The comparison is case sensitive.

```php
$str = new Utility('foo bar foo')

echo $str->substringCount('foo');
// 2

$str = new Utility('aaa')

echo $str->substringCount('aa');
// 1

$str = new Utility('Hello World')

echo $str->substringCount('xyz');
// 0
```

### surround `Utility`
Wrap a string with another string

```php
$str = new Utility('Foo Bar')

echo $str->surround('!!!');
// !!!Foo Bar!!!
```

### swap `Utility`
Swap multiple keywords in the string using a key/value map

```php
$str = new Utility('foo bar')

echo $str->swap(['foo' => 'bar', 'bar' => 'foo']);
// bar foo

$str = new Utility('a-b-c')

echo $str->swap(['a' => '1', 'b' => '2', 'c' => '3']);
// 1-2-3
```

### swapCase `Utility`
Swap the case of each character, turning uppercase into lowercase and vice versa. Multibyte aware.

```php
$str = new Utility('Hello World')

echo $str->swapCase();
// hELLO wORLD

$str = new Utility('foobar')

echo $str->swapCase();
// FOOBAR

$str = new Utility('123 !@#')

echo $str->swapCase();
// 123 !@#
```

### toAlphanumeric `Utility`
Convert the string to only contain alphanumeric values

```php
$str = new Utility('Foo Bar 123!')

echo $str->toAlphanumeric();
// FooBar123
```

### toAlpha `Utility`
Convert the string to only contain alpha characters

```php
$str = new Utility('Foo Bar 123!')

echo $str->toAlpha();
// FooBar
```

### toCamelCase `Utility`
Convert the string to be in a camel case slug format

```php
$str = new Utility('Foo Bar')

echo $str->toCamelCase();
// fooBar

$str = new Utility('Foo Bar!!! 123')

echo $str->toCamelCase();
// fooBar123
```

### toKebabCase `Utility`
Convert the string to be in a kebab case slug format

```php
$str = new Utility('Foo Bar')

echo $str->toKebabCase();
// foo-bar

$str = new Utility('Foo Bar!!! 123')

echo $str->toKebabCase();
// foo-bar-123
```

### toLowercase `Utility`
Convert the string to be all lowercase

```php
$str = new Utility('HELLO WORLD')

echo $str->toLowercase();
// hello world
```

### toNumeric `Utility`
Convert the string to only contain numeric characters

```php
$str = new Utility('Foo Bar 123!')

echo $str->toNumeric();
// 123
```

### toPascalCase `Utility`
Convert the string to be in a pascal case slug format

```php
$str = new Utility('Foo Bar')

echo $str->toPascalCase();
// FooBar

$str = new Utility('Foo Bar!!! 123')

echo $str->toPascalCase();
// FooBar123
```

### toSentenceCase `Utility`
Convert the string to be in a sentence case slug format

```php
$str = new Utility('Foo Bar')

echo $str->toSentenceCase();
// Foo bar.

$str = new Utility('Foo Bar!!! 123')

echo $str->toSentenceCase();
// Foo Bar!!! 123.
```

### toSlug `Utility`
Convert the string to be in a slug format

```php
$str = new Utility('Foo Bar')

echo $str->toSentenceCase();
// foo-bar.

$str = new Utility('Foo Bar!!! 123')

echo $str->toSentenceCase();
// foo-bar-123.
```

### toSlugUtf8 `Utility`
Convert the string to be in a slug format but preserves utf8 characters

### toSnakeCase `Utility`
Convert the string to be in a snake case format

```php
$str = new Utility('Foo Bar')

echo $str->toSnakeCase();
// foo_bar.

$str = new Utility('Foo Bar!!! 123')

echo $str->toSnakeCase();
// foo_bar_123.
```

### toStudlyCase `Utility`
Convert the string to be in a snake case format

```php
$str = new Utility('foo bar')

echo $str->toStudlyCase();
// FooBar.

$str = new Utility('Foo Bar!!! 123')

echo $str->toStudlyCase();
// FooBar123.
```

### toTitleCase `Utility`
Convert the string to be in a title case format

```php
$str = new Utility('hello world! foo bar')

echo $str->toTitleCase();
// Hello World! Foo Bar.
```

### toUppercase `Utility`
Convert the string to be all uppercase

```php
$str = new Utility('hello world')

echo $str->toUppercase();
// HELLO WORLD
```

### ucfirst `Utility`
Convert the first character of the string to uppercase. Multibyte aware.

```php
$str = new Utility('foo bar')

echo $str->ucfirst();
// Foo bar

$str = new Utility('hELLO')

echo $str->ucfirst();
// HELLO
```

### trimLeft `Utility`
Trim values from the left of the string

```php
$str = new Utility('Hello World!')

echo $str->trimLeft('H');
// ello World!

$str = new Utility('Hello World!')

echo $str->trimLeft(['H', 'el']);
// o World!
```

### trimRight `Utility`
Trim values from the right of the string

```php
$str = new Utility('Hello World!')

echo $str->trimRight('!');
// Hello World

$str = new Utility('Hello World!')

echo $str->trimLeft(['Wor', 'ld!', ' ']);
// He
```

### trim `Utility`
Trim values from the right of the string

```php
$str = new Utility('  Hello World!  ')

echo $str->trimRight(' ');
// Hello World!

$str = new Utility('       Hello World!')

echo $str->trimLeft(['!', ' ']);
// Hello World
```

### value `Utility`
Get the current value of the string

```php
$str = new Utility('Foo Bar')

echo $str->value();
// Foo Bar
```

### wordCount `int`
Count the number of words in the string. Words are runs of non-whitespace characters, so any amount of whitespace between words is treated as a single separator.

```php
$str = new Utility('Hello World')

echo $str->wordCount();
// 2

$str = new Utility('Foo   Bar   Baz')

echo $str->wordCount();
// 3

$str = new Utility('   ')

echo $str->wordCount();
// 0
```

### wrap `Utility`
Wrap the string with a value at the start and, optionally, a different value at the end. When no end value is given, the start value is used on both sides. Unlike [surround](#surround-utility), the start and end values can differ.

```php
$str = new Utility('foo')

echo $str->wrap('"');
// "foo"

$str = new Utility('hello')

echo $str->wrap('<p>', '</p>');
// <p>hello</p>
```
