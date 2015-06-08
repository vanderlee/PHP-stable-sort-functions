<?php

	function suksort(array &$array, callable $value_compare_func) {
		$keys = array_combine(array_keys($array), range(1, count($array)));
		
		$result = uksort($array, function($a, $b) use($value_compare_func, $keys) {
			$result = $value_compare_func($a, $b);
			return $result == 0 ? $keys[$a] - $keys[$b] : $result;
		});

		return $result;
	}
