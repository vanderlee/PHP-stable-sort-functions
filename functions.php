<?php

use StableSort\StableSort;

class_alias('StableSort\\StableSort', 'StableSort');

function sarsort(array &$array, $sort_flags = SORT_REGULAR)
{
	return StableSort::arsort($array, $sort_flags);
}

function sasort(array &$array, $sort_flags = SORT_REGULAR)
{
	return StableSort::asort($array, $sort_flags);
}

function snatcasesort(array &$array)
{
	return StableSort::natcasesort($array);
}

function snatsort(array &$array)
{
	return StableSort::natsort($array);
}

function suasort(array &$array, $value_compare_func)
{
	return StableSort::uasort($array, $value_compare_func);
}

function suksort(array &$array, $value_compare_func)
{
	return StableSort::uksort($array, $value_compare_func);
}

function susort(array &$array, $value_compare_func)
{
	return StableSort::usort($array, $value_compare_func);
}
