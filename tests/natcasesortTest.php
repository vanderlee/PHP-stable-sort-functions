<?php

class natcasesortTest extends PHPUnit_Framework_TestCase
{

	/**
	 * @covers StableSort::natcasesort
	 * @group  stablesort
	 */
	public function testAssociation()
	{
		$array = array('a9', 'a1', 'a10', 'A2');
		StableSort::natcasesort($array);
		$this->assertSame(array(1 => 'a1', 3 => 'A2', 0 => 'a9', 2 => 'a10'), $array);
	}

}
