PHP stable sort functions
=====================
Copyright &copy; 2015 Martijn van der Lee (http://martijn.vanderlee.com).
MIT Open Source license applies.

Introduction
------------
Collection of sort functions using stable sort. Equal values remain in the
original order. Only different values are sorted.

These sort functions follow the same interface and have the same functionality
and features as the builtin sort functions (except they add guaranteed sort
order). They have an "s" prefixed to the function name.

Each function has it's own file. Since you're likely to want to only include
the specific function(s) you need, this makes it easier. Just copy & paste.

Functions
---------
*	`bool sarsort ( array &$array [, int $sort_flags = SORT_REGULAR ] )`		
*	`bool sasort ( array &$array [, int $sort_flags = SORT_REGULAR ] )`
*	`bool snatcasesort ( array &Sarray )`
*	`bool snatsort ( array &Sarray )`
*	`bool suasort ( array &$array , callable $value_compare_func )`
*	`bool suksort ( array &$array , callable $value_compare_func )`
*	`bool susort ( array &$array , callable $value_compare_func )`

Tests
-----
PHPUnitTest testcases are included (group `stablesort`) in the `tests`
directory.

Disclaimers
-----------
Only functions that make sense are included, so no `sort` or `ksort` variants.
If you can demonstrate the case for any missing function, please let me know
and they will be included.

These are not the fastest possible implementations. In fact, I guarantee they
are not. Performance has been sacrificed for compatibility with their builtin
counterparts.

Changes
-------
### 2015-05-23
*	Initial public release