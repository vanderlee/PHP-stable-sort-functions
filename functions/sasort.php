<?php

function sasort(array &$array, $sort_flags = SORT_REGULAR)
{
	require_once dirname(__DIR__) . '/classes/StableSort.php';

	return StableSort::asort($array, $sort_flags);
}
