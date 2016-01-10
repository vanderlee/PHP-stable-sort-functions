<?php

class usortTest extends PHPUnit_Framework_TestCase
{

	public static function compare_integer($a, $b)
	{
		return $a[1] - $b[1];
	}

	/**
	 * @covers StableSort::usort
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
			0 => array('yellow', 1),
			1 => array('green', 2),
			2 => array('blue', 2),
			3 => array('red', 3),
		);

		$array = $source;
		StableSort::usort($array, array(__CLASS__, 'compare_integer'));
		$this->assertSame($expected, $array);
	}

}
