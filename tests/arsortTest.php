<?php

class arsortTest extends PHPUnit_Framework_TestCase
{

	/**
	 * @covers StableSort::arsort
	 * @group  stablesort
	 */
	public function testAssociation()
	{
		$source = array(
			'a' => 1,
			'b' => 2,
			'c' => 2,
			'd' => 3,
		);

		$expected = array(
			'd' => 3,
			'b' => 2,
			'c' => 2,
			'a' => 1,
		);

		$array = $source;
		StableSort::arsort($array);
		$this->assertSame($expected, $array);
	}

	/**
	 * @covers StableSort::arsort
	 * @group  stablesort
	 * @requires PHP 5.4
	 */
	public function testNatural()
	{
		$array = array('a9', 'a1', 'a10');
		StableSort::arsort($array, SORT_NATURAL);
		$this->assertSame(array(2 => 'a10', 0 => 'a9', 1 => 'a1'), $array);
	}

	/**
	 * @covers StableSort::arsort
	 * @group  stablesort
	 */
	public function testRegular()
	{
		$array = array('a9', 'a1', 'a10');
		StableSort::arsort($array, SORT_REGULAR);
		$this->assertNotSame(array(2 => 'a10', 0 => 'a9', 1 => 'a1'), $array);
	}

}
