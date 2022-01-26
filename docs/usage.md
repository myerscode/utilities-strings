# Usage

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
