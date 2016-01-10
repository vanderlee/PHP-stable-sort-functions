<?php

function susort(array &$array, $value_compare_func)
{
	require_once dirname(__DIR__) . '/classes/StableSort.php';

	return StableSort::usort($array, $value_compare_func);
}
