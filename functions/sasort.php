<?php

	function sasort(array &$array, $sort_flags = SORT_REGULAR) {
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
			return key($set);
		});

		foreach ($array as &$item) {
			$item = $item[1];
		}

		return $result;
	}
