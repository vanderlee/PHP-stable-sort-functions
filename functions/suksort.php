<?php

function suksort(array &$array, $value_compare_func)
{
	require_once dirname(__DIR__) . '/classes/StableSort.php';

	return StableSort::uksort($array, $value_compare_func);
}
