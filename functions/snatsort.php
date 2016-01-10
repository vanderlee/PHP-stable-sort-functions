<?php

function snatsort(array &$array)
{
	require_once dirname(__DIR__) . '/classes/StableSort.php';

	return StableSort::natsort($array);
}
