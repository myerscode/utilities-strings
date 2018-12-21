# Strings Utilities
> A PHP utility class that creates a fluent interface for interacting with strings

[![Latest Stable Version](https://poser.pugx.org/myerscode/utilities-strings/v/stable)](https://packagist.org/packages/myerscode/utilities-strings)
[![Total Downloads](https://poser.pugx.org/myerscode/utilities-strings/downloads)](https://packagist.org/packages/myerscode/utilities-strings)
[![License](https://poser.pugx.org/myerscode/utilities-strings/license)](https://packagist.org/packages/myerscode/utilities-strings)

## Install

You can install this package via composer:

``` bash
composer require myerscode/utilities-strings
```

## Usage

Create an instance of the fluent interface by creating a new instance either via `new Utility($val)` or `Utility::make($val)`

You may pass an optional encoding type, otherwise it will default to the current internal character encoding.

``` php
$str = new Utility('Hello World');
echo $str;
// Hello World

$str = Utility::make('Foo Bar', 'UTF-8');
echo $str->value();
// Foo Bar
```

You can then chain  methods together to make life easy for yourself

```php
$str = new Utility('World');

echo $str->ensureBeingsWith('Hello ')->prepend('Foo Bar')->toSlug()->append('-123');
// hello-world-foo-bar-123
```

## Methods

#### append `Utility`
Append a value to the string

```php
$str = new Utility('Hello World');

echo $str->append('!');
// Hello World!
```

#### at `string`
Get the character at a specific index

```php
$str = new Utility('Hello World');

echo $str->at(6);
// W
```

#### beginsWith `bool`
BeginsWith defaults to case insensitive checks.

```php
$str = new Utility('Hello World');

echo $str->beginsWith('hello');
// true

echo $str->beginsWith('hello', true);
// false
```

#### clean `Utility`
Clean will do a basic `trim` and `strip_tags` calls on the string.

You can pass an optional `$allowable_tags` parameter to do define tags that the underlying `strip_tags` will preserve.

```php
$str = new Utility('<p>Hello <strong>World</strong></p>');

echo $str->clean();
// Hello World

echo $str->beginsWith('<p>Hello <strong>World</strong></p>', '<p>');
// <p>Hello World</p>
```

#### containsAll `bool`
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

#### containsAny `bool`
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

#### endsWith `bool`
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

#### ensureBeingsWith `Utility`
Check if the string beings with the given value, if not prepends it.

```php
$str = new Utility('Foo Bar')

echo $str->ensureBeingsWith('Foo');
// Foo Bar

echo $str->ensureBeingsWith('Hello ');
// Hello Foo Bar
```

#### ensureEndsWith `Utility`
Check if the string ends with the given value, if not appends it.

```php
$str = new Utility('Foo Bar')

echo $str->ensureEndsWith('Bar');
// Foo Bar

echo $str->ensureEndsWith(' World');
// Foo Bar World
```

#### equals `bool`
Compare the string with another
```php
$str = new Utility('Foo Bar')

echo $str->equals('Foo Bar');
// true

echo $str->ensureEndsWith('foo bar');
// false
```

#### explode `array`
Explode the string by a delimiter, trimming and removing any empty values from the results
```php
$str = new Utility('Foo, Bar');
echo $str->explode(',');
// ['Foo', 'Bar']

$str = new Utility('Foo,,,,Bar');
echo $str->explode(',');
// ['Foo', 'Bar']
```

#### format `bool`
Replace placeholders with the given values in order

```php
$str = new Utility('Hello {0} Foo {1}')

echo $str->format('World', 'Bar);
// Hello World Foo Bar

$str = new Utility('{0} {1} {0} {1} {0} {1}')
echo $str->format('Foo', 'Bar');
// Foo Bar Foo Bar Foo Bar 
```

#### isAlphanumeric `bool`
Check if the string only contains alphanumeric characters

```php
$str = new Utility('Foo Bar 123')

echo $str->isAlphanumeric();
// true

$str = new Utility('Foo Bar!!!')

echo $str->isAlphanumeric();
// false
```

#### isAlpha `bool`
Check if the string only contains alpha characters

```php
$str = new Utility('FooBar')

echo $str->isAlpha();
// true

$str = new Utility('Foo Bar!!!')

echo $str->isAlpha();
// false
```

#### isEmail `bool`
Check if the string is in an email format

```php
$str = new Utility('foo@bar.com')

echo $str->isEmail();
// true

$str = new Utility('@world com')

echo $str->isEmail();
// false
```

#### isFalse `bool`
Check if the string could be assumed to represent a false value ("false", "0", "no", "off", "")

```php
$str = new Utility('false')

echo $str->isFalse();
// true

$str = new Utility('true')

echo $str->isFalse();
// false
```

#### isJson `bool`
Check if the string is valid JSON

```php
$str = new Utility('{ "foo":"bar", "hello":"world" }')

echo $str->isJson();
// true

$str = new Utility('"foo":"bar", "hello":"world"')

echo $str->isJson();
// false
```

#### isTrue `bool`
Check if the string could be assumed to represent a true value ("true", "1", "yes", "on", "ok")

```php
$str = new Utility('true')

echo $str->isTrue();
// true

$str = new Utility('false')

echo $str->isTrue();
// false
```

#### length `int`
Get the length of the string

```php
$str = new Utility('hello world')

echo $str->length();
// 11
```

#### limit `Utility`
Limit the length of the string to a given value

```php
$str = new Utility('Hello World')

echo $str->limit(5);
// Hello
```

#### minimise `Utility`
Minimise the string removing all spaces and all unnecessary html attributes 

```php
$str = new Utility('foo           <select><option>bar</option></select>')

echo $str->length();
// foo <select><option>foobar</select>
```

#### occurrences `array`
Find the starting positions for all occurrences of a given value in the string

```php
$str = new Utility('hello world. foo bar. food. foo bar. hello world.')

echo $str->occurrences('foo');
// [13, 22, 28]
```

#### padLeft `Utility`
Repeat a value on the left of the string, until it reaches a given length

```php
$str = new Utility('foo')

echo $str->padLeft('!', 6);
// !!!foo
```

#### padRight `Utility`
Repeat a value on the right of the string, until it reaches a given length

```php
$str = new Utility('foo')

echo $str->padRight('!', 6);
// foo!!!
```

#### pad `Utility`
Repeat a value on both sides of the string, until it reaches a given length

```php
$str = new Utility('foo')

echo $str->pad('!*', 7);
// !*foo!*

// !foo!!
echo $str->pad('.', 6);
// .foo..
```

#### prepend `Utility`
Prepend a value to the string

```php
$str = new Utility('World')

echo $str->prepend('Hello ');

// Hello World
```

#### removePunctuation `Utility`
Strip the string of any punctuation characters

```php
$str = new Utility('Hello, World! It\'s a lovley day.')

echo $str->removePunctuation();

// Hello World Its a lovley day
```

#### removeRepeating `Utility`
Strip the string of any repeating characters

```php
$str = new Utility('Foo        Bar')

echo $str->removeRepeating(' ');
// Foo Bar

$str = new Utility('Hello World!!!!!!!!')

echo $str->removeRepeating('!');
// Hello World!
```

#### removeSpace `Utility`
Strip the string of any space characters

```php
$str = new Utility('Foo        Bar. Hello World')

echo $str->removeSpace();
// FooBar.HelloWorld
```

#### remove `Utility`
Remove occurrences of a given value from the string

```php
$str = new Utility('Foo Bar. Hello World')

echo $str->remove('o');
// F Bar Hell Wrld
```

#### repeat `Utility`
Repeat the string the amount of times specified

```php
$str = new Utility('Foo Bar.')

echo $str->repeat(4);
// Foo Bar.Foo Bar.Foo Bar.Foo Bar.
```

#### replaceNonAlphanumeric `Utility`
Replace non alphanumeric values with a give value

Has an optional `$strict` parameter to preserve spaces or not, defaults to `false`

```php
$str = new Utility('Foo Bar.')

echo $str->replaceNonAlphanumeric('');
// Foo Bar

echo $str->replaceNonAlphanumeric('', true);
// FooBar
```

#### replaceNonAlpha `Utility`
Replace non alpha values with a give value

Has an optional `$strict` parameter to preserve spaces or not, defaults to `false`

```php
$str = new Utility('Foo Bar. 123')

echo $str->replaceNonAlpha('');
// Foo Bar

echo $str->replaceNonAlpha('', true);
// FooBar
```

#### replaceNonNumeric `Utility`
Replace non numeric values with a give value

Has an optional `$strict` parameter to preserve spaces or not, defaults to `false`

```php
$str = new Utility('Foo Bar. 123')

echo $str->replaceNonNumeric('');
//   123

echo $str->replaceNonNumeric('', true);
// 123
```

#### replace `Utility`
Replace all occurrences of values from the string with another value

```php
$str = new Utility('Foo Bar. 123')

echo $str->replace('123', '!!!');
// Foo Bar.

echo $str->replace(['Foo', 'Bar'], '');
// .123
```

#### reverse `Utility`
Reverse the string

```php
$str = new Utility('foobar')

echo $str->reverse();
// raboof
```

#### slice `Utility`
Create a slice of the string, starting at the index stated `$start` property for a length of the `$end` property

```php
$str = new Utility('foobar')

echo $str->slice(0,3);
// foo
```

#### substring `Utility`
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

#### toAlphanumeric `Utility`
Convert the string to only contain alphanumeric values

```php
$str = new Utility('Foo Bar 123!')

echo $str->toAlphanumeric();
// FooBar123
```

#### toAlpha `Utility`
Convert the string to only contain alpha characters

```php
$str = new Utility('Foo Bar 123!')

echo $str->toAlpha();
// FooBar
```

#### toCamelCase `Utility`
Convert the string to be in a camel case slug format

```php
$str = new Utility('Foo Bar')

echo $str->toCamelCase();
// fooBar

$str = new Utility('Foo Bar!!! 123')

echo $str->toCamelCase();
// fooBar123
```

#### toKebabCase `Utility`
Convert the string to be in a kebab case slug format

```php
$str = new Utility('Foo Bar')

echo $str->toKebabCase();
// foo-bar

$str = new Utility('Foo Bar!!! 123')

echo $str->toKebabCase();
// foo-bar-123
```

#### toLowercase `Utility`
Convert the string to be all lowercase

```php
$str = new Utility('HELLO WORLD')

echo $str->toLowercase();
// hello world
```

#### toNumeric `Utility`
Convert the string to only contain numeric characters

```php
$str = new Utility('Foo Bar 123!')

echo $str->toNumeric();
// 123
```

#### toPascalCase `Utility`
Convert the string to be in a pascal case slug format

```php
$str = new Utility('Foo Bar')

echo $str->toPascalCase();
// FooBar

$str = new Utility('Foo Bar!!! 123')

echo $str->toPascalCase();
// FooBar123
```

#### toSentenceCase `Utility`
Convert the string to be in a sentence case slug format

```php
$str = new Utility('Foo Bar')

echo $str->toSentenceCase();
// Foo bar.

$str = new Utility('Foo Bar!!! 123')

echo $str->toSentenceCase();
// Foo Bar!!! 123.
```

#### toSlug `Utility`
Convert the string to be in a slug format

```php
$str = new Utility('Foo Bar')

echo $str->toSentenceCase();
// foo-bar.

$str = new Utility('Foo Bar!!! 123')

echo $str->toSentenceCase();
// foo-bar-123.
```

#### toSlugUtf8 `Utility`
Convert the string to be in a slug format but preserves utf8 characters

#### toSnakeCase `Utility`
Convert the string to be in a snake case format

```php
$str = new Utility('Foo Bar')

echo $str->toSnakeCase();
// foo_bar.

$str = new Utility('Foo Bar!!! 123')

echo $str->toSnakeCase();
// foo_bar_123.
```

#### toStudlyCase `Utility`
Convert the string to be in a snake case format

```php
$str = new Utility('foo bar')

echo $str->toStudlyCase();
// FooBar.

$str = new Utility('Foo Bar!!! 123')

echo $str->toStudlyCase();
// FooBar123.
```

#### toTitleCase `Utility`
Convert the string to be in a title case format

```php
$str = new Utility('hello world! foo bar')

echo $str->toTitleCase();
// Hello World! Foo Bar.
```

#### toUppercase `Utility`
Convert the string to be all uppercase

```php
$str = new Utility('hello world')

echo $str->toUppercase();
// HELLO WORLD
```

#### trimLeft `Utility`
Trim values from the left of the string

```php
$str = new Utility('Hello World!')

echo $str->trimLeft('H');
// ello World!

$str = new Utility('Hello World!')

echo $str->trimLeft(['H', 'el']);
// o World!
```

#### trimRight `Utility`
Trim values from the right of the string

```php
$str = new Utility('Hello World!')

echo $str->trimRight('!');
// Hello World

$str = new Utility('Hello World!')

echo $str->trimLeft(['Wor', 'ld!', ' ']);
// He
```

#### trim `Utility`
Trim values from the right of the string

```php
$str = new Utility('  Hello World!  ')

echo $str->trimRight(' ');
// Hello World!

$str = new Utility('       Hello World!')

echo $str->trimLeft(['!', ' ']);
// Hello World
```

#### value `Utility`
Get the current value of the string

```php
$str = new Utility('Foo Bar')

echo $str->value();
// Foo Bar
```


## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.