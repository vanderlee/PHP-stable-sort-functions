<?php

	function snatcasesort(array &$array) {
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
