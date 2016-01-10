<?php

class functionsTest extends PHPUnit_Framework_TestCase
{

	/**
	 * Utility for tests which require a callback.
	 * Compares integers
	 * @param integer $a
	 * @param integer $b
	 * @return integer
	 */
	public static function compare_integer($a, $b)
	{
		return $a[1] - $b[1];
	}

	/**
	 * Utility for tests which require a callback.
	 * Compares strings
	 * @param string $a
	 * @param string $b
	 * @return integer
	 */
	public static function compare_string_skip($a, $b)
	{
		return strcmp(substr($a, 1), substr($b, 1));
	}

	/**
	 * @covers sarsort
	 * @group  stablesort
	 */
	public function testSarsort()
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
		sarsort($array);
		$this->assertSame($expected, $array);
	}

	/**
	 * @covers sasort
	 * @group  stablesort
	 */
	public function testSasort()
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
		sasort($array);
		$this->assertSame($expected, $array);
	}

	/**
	 * @covers snatcasesort
	 * @group  stablesort
	 */
	public function testSnatcasesort()
	{
		$array = array('a9', 'a1', 'a10', 'A2');
		snatcasesort($array);
		$this->assertSame(array(1 => 'a1', 3 => 'A2', 0 => 'a9', 2 => 'a10'), $array);
	}

	/**
	 * @covers snatsort
	 * @group  stablesort
	 */
	public function testSnatsort()
	{
		$array = array('a9', 'a1', 'a10', 'A2');
		snatsort($array);
		$this->assertSame(array(3 => 'A2', 1 => 'a1', 0 => 'a9', 2 => 'a10'), $array);
	}

	/**
	 * @covers suasort
	 * @group  stablesort
	 */
	public function testSuasort()
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
		suasort($array, array(__CLASS__, 'compare_integer'));
		$this->assertSame($expected, $array);
	}

	/**
	 * @covers suksort
	 * @group  stablesort
	 */
	public function testSuksort()
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
		suksort($array, array(__CLASS__, 'compare_string_skip'));
		$this->assertSame($expected, $array);
	}

	/**
	 * @covers susort
	 * @group  stablesort
	 */
	public function testSusort()
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
		susort($array, array(__CLASS__, 'compare_integer'));
		$this->assertSame($expected, $array);
	}

}
