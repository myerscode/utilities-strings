# Strings Utilities
> A PHP utility class that creates a fluent interface for interacting with strings

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/myerscode/utilities-strings/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/myerscode/utilities-strings/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/myerscode/utilities-strings/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/myerscode/utilities-strings/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/myerscode/utilities-strings/badges/build.png?b=master)](https://scrutinizer-ci.com/g/myerscode/utilities-strings/build-status/master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/43840a21-0e49-4bab-b288-5906b59e61c3/mini.png)](https://insight.sensiolabs.com/projects/43840a21-0e49-4bab-b288-5906b59e61c3)

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

## Methods
