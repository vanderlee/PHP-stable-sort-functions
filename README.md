PHP stable sort
===============
Version 2.0.2
[![Build Status](https://travis-ci.org/vanderlee/PHP-stable-sort-functions.svg)](https://travis-ci.org/vanderlee/PHP-stable-sort-functions)

Copyright &copy; 2015-2016 Martijn van der Lee (http://martijn.vanderlee.com).
MIT Open Source license applies.

Introduction
------------
Class of stable sort utility methods and standalone functions. Equal values
remain in the original order. Only different values are sorted.

These sort utility methods follow the same interface and have the same
functionality and features as the builtin sort utility methods (except they add
guaranteed sort order).

Static methods
--------------
*	`bool StableSort::arsort ( array &$array [, int $sort_flags = SORT_REGULAR ] )`
*	`bool StableSort::asort ( array &$array [, int $sort_flags = SORT_REGULAR ] )`
*	`bool StableSort::natcasesort ( array &Sarray )`
*	`bool StableSort::natsort ( array &Sarray )`
*	`bool StableSort::uasort ( array &$array , callable $value_compare_func )`
*	`bool StableSort::uksort ( array &$array , callable $value_compare_func )`
*	`bool StableSort::usort ( array &$array , callable $value_compare_func )`

For backwards compatibility, functions (prefixed with `s`) are available that
utilize the utility class.

Tests
-----
PHPUnitTest testcases are included (group `stablesort`) in the `tests`
directory.

Disclaimers
-----------
Only methods that make sense for stable sorting are included, so no `sort` or
`ksort` variants. If you can demonstrate the case for any missing function,
please let me know and they will be included.

These are not the fastest possible implementations. In fact, I guarantee they
are not. Performance has been sacrificed for compatibility with their builtin
counterparts.

Changes
-------
### 2.0.1
*	Merge @joelpittet 2.0.0 into main branch, cleaning Drupal specifics.

### 2.0.0
*	Converted to Utility class. By @joelpittet

### 1.0.3
*	Added `reset` calls to `sasort`/`sarsort` to ensure pointer. By @emilv.

### 1.0.2
*	PHP 5.3 compatibility changes by @folliked.

### 1.0.1
*	composer.json added by @thebeline.

### 1.0
*	Initial public release
