<?php

namespace StableSort;

/**
 * SortArray utility class.
 */
class StableSort
{

    private static function createValueComparator($sort_flags)
    {
        $caseFlag = defined('SORT_FLAG_CASE') ? constant('SORT_FLAG_CASE') : 0;
        $caseInsensitive = $caseFlag && (($sort_flags & $caseFlag) === $caseFlag);
        $baseFlags = $caseInsensitive ? ($sort_flags & ~$caseFlag) : $sort_flags;

        return function($a, $b) use($caseInsensitive, $baseFlags) {
            if (defined('SORT_NATURAL') && $baseFlags === constant('SORT_NATURAL')) {
                return $caseInsensitive
                    ? strnatcasecmp((string) $a, (string) $b)
                    : strnatcmp((string) $a, (string) $b);
            }

            switch ($baseFlags) {
                case SORT_NUMERIC:
                    if ((float) $a == (float) $b) {
                        return 0;
                    }

                    return (float) $a < (float) $b ? -1 : 1;

                case SORT_STRING:
                    return $caseInsensitive
                        ? strcasecmp((string) $a, (string) $b)
                        : strcmp((string) $a, (string) $b);

                case SORT_LOCALE_STRING:
                    return strcoll((string) $a, (string) $b);

                case SORT_REGULAR:
                default:
                    if ($a == $b) {
                        return 0;
                    }

                    return $a < $b ? -1 : 1;
            }
        };
    }

    static public function arsort(array &$array, $sort_flags = SORT_REGULAR)
    {
        if (PHP_MAJOR_VERSION >= 8) {
            return arsort($array, $sort_flags);
        }

        $index = 0;
        $decorated = array();
        foreach ($array as $key => $item) {
            $decorated[$key] = array($index++, $item);
        }

        $compareValues = self::createValueComparator($sort_flags);
        $result = uasort($decorated, function($a, $b) use($compareValues) {
            $comparison = call_user_func($compareValues, $a[1], $b[1]);
            return $comparison == 0 ? $a[0] - $b[0] : -$comparison;
        });

        $sorted = array();
        foreach ($decorated as $key => $item) {
            $sorted[$key] = $item[1];
        }
        $array = $sorted;

        return $result;
    }

    static public function asort(array &$array, $sort_flags = SORT_REGULAR)
    {
        if (PHP_MAJOR_VERSION >= 8) {
            return asort($array, $sort_flags);
        }

        $index = 0;
        $decorated = array();
        foreach ($array as $key => $item) {
            $decorated[$key] = array($index++, $item);
        }

        $compareValues = self::createValueComparator($sort_flags);
        $result = uasort($decorated, function($a, $b) use($compareValues) {
            $comparison = call_user_func($compareValues, $a[1], $b[1]);
            return $comparison == 0 ? $a[0] - $b[0] : $comparison;
        });

        $sorted = array();
        foreach ($decorated as $key => $item) {
            $sorted[$key] = $item[1];
        }
        $array = $sorted;

        return $result;
    }

    static public function natcasesort(array &$array)
    {
        if (PHP_MAJOR_VERSION >= 8) {
            return natcasesort($array);
        }

        $index = 0;
        $decorated = array();
        foreach ($array as $key => $item) {
            $decorated[$key] = array($index++, $item);
        }

        $result = uasort($decorated, function($a, $b) {
            $comparison = strnatcasecmp($a[1], $b[1]);
            return $comparison == 0 ? $a[0] - $b[0] : $comparison;
        });

        $sorted = array();
        foreach ($decorated as $key => $item) {
            $sorted[$key] = $item[1];
        }
        $array = $sorted;

        return $result;
    }

    static public function natsort(array &$array)
    {
        if (PHP_MAJOR_VERSION >= 8) {
            return natsort($array);
        }

        $index = 0;
        $decorated = array();
        foreach ($array as $key => $item) {
            $decorated[$key] = array($index++, $item);
        }

        $result = uasort($decorated, function($a, $b) {
            $comparison = strnatcmp($a[1], $b[1]);
            return $comparison == 0 ? $a[0] - $b[0] : $comparison;
        });

        $sorted = array();
        foreach ($decorated as $key => $item) {
            $sorted[$key] = $item[1];
        }
        $array = $sorted;

        return $result;
    }

    static public function uasort(array &$array, $value_compare_func)
    {
        if (PHP_MAJOR_VERSION >= 8) {
            return uasort($array, $value_compare_func);
        }

        $index = 0;
        $decorated = array();
        foreach ($array as $key => $item) {
            $decorated[$key] = array($index++, $item);
        }

        $result = uasort($decorated, function($a, $b) use($value_compare_func) {
            $comparison = call_user_func($value_compare_func, $a[1], $b[1]);
            return $comparison == 0 ? $a[0] - $b[0] : $comparison;
        });

        $sorted = array();
        foreach ($decorated as $key => $item) {
            $sorted[$key] = $item[1];
        }
        $array = $sorted;

        return $result;
    }

    static public function uksort(array &$array, $value_compare_func)
    {
        if (PHP_MAJOR_VERSION >= 8) {
            return uksort($array, $value_compare_func);
        }

        if (count($array) < 2) {
            return true;
        }

        $sorted = $array;
        $keys = array_combine(array_keys($sorted), range(1, count($sorted)));

        $result = uksort($sorted, function($a, $b) use($value_compare_func, $keys) {
            $comparison = call_user_func($value_compare_func, $a, $b);
            return $comparison == 0 ? $keys[$a] - $keys[$b] : $comparison;
        });

        $array = $sorted;

        return $result;
    }

    static public function usort(array &$array, $value_compare_func)
    {
        if (PHP_MAJOR_VERSION >= 8) {
            return usort($array, $value_compare_func);
        }

        $index = 0;
        $decorated = array();
        foreach ($array as $item) {
            $decorated[] = array($index++, $item);
        }

        $result = usort($decorated, function($a, $b) use($value_compare_func) {
            $comparison = call_user_func($value_compare_func, $a[1], $b[1]);
            return $comparison == 0 ? $a[0] - $b[0] : $comparison;
        });

        $sorted = array();
        foreach ($decorated as $item) {
            $sorted[] = $item[1];
        }
        $array = $sorted;

        return $result;
    }

}
