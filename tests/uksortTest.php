<?php

class uksortTest extends PHPUnit_Framework_TestCase
{

	public static function compare_string_skip($a, $b)
	{
		return strcmp(substr($a, 1), substr($b, 1));
	}

	/**
	 * @covers StableSort::uksort
	 * @group  stablesort
	 */
	public function testAssociation()
	{
		$source = array(
			'a3' => 1,
			'b2' => 2,
			'c2' => 3,
			'd1' => 4,
		);

		$expected = array(
			'd1' => 4,
			'b2' => 2,
			'c2' => 3,
			'a3' => 1,
		);

		$array = $source;
		StableSort::uksort($array, array(__CLASS__, 'compare_string_skip'));
		$this->assertSame($expected, $array);
	}

}
