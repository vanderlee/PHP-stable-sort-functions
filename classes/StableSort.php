<?php

/**
 * SortArray utility class.
 */
class StableSort
{

	static public function arsort(array &$array, $sort_flags = SORT_REGULAR)
	{
		$index = 0;
		foreach ($array as &$item) {
			$item = array($index++, $item);
		}

		$result = uasort($array, function($a, $b) use($sort_flags) {
			if ($a[1] == $b[1]) {
				return $a[0] - $b[0];
			}

			$set = array(-1 => $b[1], 1 => $a[1]);
			asort($set, $sort_flags);
			reset($set);
			return key($set);
		});

		foreach ($array as &$item) {
			$item = $item[1];
		}

		return $result;
	}

	static public function asort(array &$array, $sort_flags = SORT_REGULAR)
	{
		$index = 0;
		foreach ($array as &$item) {
			$item = array($index++, $item);
		}

		$result = uasort($array, function($a, $b) use($sort_flags) {
			if ($a[1] == $b[1]) {
				return $a[0] - $b[0];
			}

			$set = array(-1 => $a[1], 1 => $b[1]);
			asort($set, $sort_flags);
			reset($set);
			return key($set);
		});

		foreach ($array as &$item) {
			$item = $item[1];
		}

		return $result;
	}

	static public function natcasesort(array &$array)
	{
		$index = 0;
		foreach ($array as &$item) {
			$item = array($index++, $item);
		}

		$result = uasort($array, function($a, $b) {
			$result = strnatcasecmp($a[1], $b[1]);
			return $result == 0 ? $a[0] - $b[0] : $result;
		});

		foreach ($array as &$item) {
			$item = $item[1];
		}

		return $result;
	}

	static public function natsort(array &$array)
	{
		$index = 0;
		foreach ($array as &$item) {
			$item = array($index++, $item);
		}

		$result = uasort($array, function($a, $b) {
			$result = strnatcmp($a[1], $b[1]);
			return $result == 0 ? $a[0] - $b[0] : $result;
		});

		foreach ($array as &$item) {
			$item = $item[1];
		}

		return $result;
	}

	static public function uasort(array &$array, $value_compare_func)
	{
		$index = 0;
		foreach ($array as &$item) {
			$item = array($index++, $item);
		}

		$result = uasort($array, function($a, $b) use($value_compare_func) {
			$result = call_user_func($value_compare_func, $a[1], $b[1]);
			return $result == 0 ? $a[0] - $b[0] : $result;
		});

		foreach ($array as &$item) {
			$item = $item[1];
		}

		return $result;
	}

	static public function uksort(array &$array, $value_compare_func)
	{
		$keys = array_combine(array_keys($array), range(1, count($array)));

		$result = uksort($array, function($a, $b) use($value_compare_func, $keys) {
			$result = call_user_func($value_compare_func, $a, $b);
			return $result == 0 ? $keys[$a] - $keys[$b] : $result;
		});

		return $result;
	}

	static public function usort(array &$array, $value_compare_func)
	{
		$index = 0;
		foreach ($array as &$item) {
			$item = array($index++, $item);
		}

		$result = usort($array, function($a, $b) use($value_compare_func) {
			$result = call_user_func($value_compare_func, $a[1], $b[1]);
			return $result == 0 ? $a[0] - $b[0] : $result;
		});

		foreach ($array as &$item) {
			$item = $item[1];
		}

		return $result;
	}

}
