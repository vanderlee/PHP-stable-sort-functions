<?php

	function suksort(array &$array, $value_compare_func) {
		$keys = array_combine(array_keys($array), range(1, count($array)));
		
		$result = uksort($array, function($a, $b) use($value_compare_func, $keys) {
			$result = call_user_func($value_compare_func, $a, $b);
			return $result == 0 ? $keys[$a] - $keys[$b] : $result;
		});

		return $result;
	}
