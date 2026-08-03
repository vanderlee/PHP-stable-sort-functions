# PHP stable sort

Version 2.0.7

[![Tests](https://github.com/vanderlee/PHP-stable-sort-functions/actions/workflows/tests.yml/badge.svg)](https://github.com/vanderlee/PHP-stable-sort-functions/actions/workflows/tests.yml)

Copyright &copy; 2015-2026 Martijn van der Lee.
MIT Open Source license applies.

## Introduction

A compatibility library that provides stable versions of PHP's array sorting functions. Equal values retain their original relative order.

PHP 8 and later already guarantee stable native sorting, so this package delegates directly to PHP's built-in functions on those versions. Its custom stable-sort implementation is primarily useful for applications that still support PHP 5.3 through PHP 7.4.

## Installation

Install the package with Composer:

```bash
composer require vanderlee/php-stable-sort-functions
```

## Usage

Use the `StableSort\StableSort` utility class:

```php
use StableSort\StableSort;

$items = array(
    array('name' => 'first', 'score' => 10),
    array('name' => 'second', 'score' => 5),
    array('name' => 'third', 'score' => 10),
);

StableSort::usort($items, function ($left, $right) {
    return $left['score'] - $right['score'];
});
```

`first` remains before `third` because their comparison result is equal.

## Static methods

The methods follow the interfaces of their native PHP counterparts while guaranteeing stable ordering on PHP versions before 8.0:

- `bool StableSort::arsort(array &$array, int $sort_flags = SORT_REGULAR)`
- `bool StableSort::asort(array &$array, int $sort_flags = SORT_REGULAR)`
- `bool StableSort::natcasesort(array &$array)`
- `bool StableSort::natsort(array &$array)`
- `bool StableSort::uasort(array &$array, callable $value_compare_func)`
- `bool StableSort::uksort(array &$array, callable $key_compare_func)`
- `bool StableSort::usort(array &$array, callable $value_compare_func)`

## Compatibility functions

For backwards compatibility, global functions prefixed with `s` call the corresponding utility method:

- `sarsort()`
- `sasort()`
- `snatcasesort()`
- `snatsort()`
- `suasort()`
- `suksort()`
- `susort()`

## Development

Install the development dependencies and run the tests:

```bash
composer install
composer test
```

## Scope and performance

Only operations for which stable ordering is meaningful are included. Functions such as `sort()` and `ksort()` do not preserve associative keys and are therefore outside the current API.

The legacy implementation prioritizes compatibility with PHP's built-in sorting interfaces over raw performance. On PHP 8+, native functions are used directly.

## Changes

### 2.0.7

- Restore reproducible CI across supported PHP versions.
- Refresh project documentation.
- Fix legacy sort edge cases.

### 2.0.6

- Use native sorting functions on PHP 8 and later.

### 2.0.1

- Merge the 2.0 utility-class implementation into the main branch and remove Drupal-specific details.

### 2.0.0

- Convert the implementation to a utility class, contributed by @joelpittet.

### 1.0.3

- Add `reset()` calls to `sasort()` and `sarsort()` to ensure the expected array pointer, contributed by @emilv.

### 1.0.2

- Add PHP 5.3 compatibility changes, contributed by @folliked.

### 1.0.1

- Add `composer.json`, contributed by @thebeline.

### 1.0

- Initial public release.
