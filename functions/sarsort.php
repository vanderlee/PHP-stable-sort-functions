<?php

function sarsort(array &$array, $sort_flags = SORT_REGULAR)
{
	require_once dirname(__DIR__) . '/classes/StableSort.php';

	return StableSort::arsort($array, $sort_flags);
}
