<?php

class uasortTest extends PHPUnit_Framework_TestCase
{

	public static function compare_integer($a, $b)
	{
		return $a[1] - $b[1];
	}

	/**
	 * @covers StableSort::uasort
	 * @group  stablesort
	 */
	public function testAssociation()
	{
		$source = array(
			'a' => array('red', 3),
			'b' => array('green', 2),
			'c' => array('blue', 2),
			'd' => array('yellow', 1),
		);

		$expected = array(
			'd' => array('yellow', 1),
			'b' => array('green', 2),
			'c' => array('blue', 2),
			'a' => array('red', 3),
		);

		$array = $source;
		StableSort::uasort($array, array(__CLASS__, 'compare_integer'));
		$this->assertSame($expected, $array);
	}

}
