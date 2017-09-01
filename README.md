# Strings Utilities
> A PHP utility class that creates a fluent interface for interacting with strings

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