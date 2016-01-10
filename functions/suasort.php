<?php

function suasort(array &$array, $value_compare_func)
{
	require_once dirname(__DIR__) . '/classes/StableSort.php';

	return StableSort::uasort($array, $value_compare_func);
}
