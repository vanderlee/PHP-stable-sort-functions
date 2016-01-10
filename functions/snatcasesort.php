<?php

function snatcasesort(array &$array)
{
	require_once dirname(__DIR__) . '/classes/StableSort.php';

	return StableSort::natcasesort($array);
}
