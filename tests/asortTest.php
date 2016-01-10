<?php

class asortTest extends PHPUnit_Framework_TestCase
{

	/**
	 * @covers StableSort::asort
	 * @group  stablesort
	 */
	public function testAssociation()
	{
		$source = array(
			'a' => 3,
			'b' => 2,
			'c' => 2,
			'd' => 1,
		);

		$expected = array(
			'd' => 1,
			'b' => 2,
			'c' => 2,
			'a' => 3,
		);

		$array = $source;
		StableSort::asort($array);
		$this->assertSame($expected, $array);
	}

	/**
	 * @covers StableSort::asort
	 * @group  stablesort
	 * @requires PHP 5.4
	 */
	public function testNatural()
	{
		$array = array('a9', 'a1', 'a10');
		StableSort::asort($array, SORT_NATURAL);
		$this->assertSame(array(1 => 'a1', 0 => 'a9', 2 => 'a10'), $array);
	}

	/**
	 * @covers StableSort::asort
	 * @group  stablesort
	 */
	public function testRegular()
	{
		$array = array('a9', 'a1', 'a10');
		StableSort::asort($array, SORT_REGULAR);
		$this->assertNotSame(array(1 => 'a1', 0 => 'a9', 2 => 'a10'), $array);
	}

}
