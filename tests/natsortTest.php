<?php

class natsortTest extends PHPUnit_Framework_TestCase
{

	/**
	 * @covers StableSort::natsort
	 * @group  stablesort
	 */
	public function testAssociation()
	{
		$array = array('a9', 'a1', 'a10', 'A2');
		StableSort::natsort($array);
		$this->assertSame(array(3 => 'A2', 1 => 'a1', 0 => 'a9', 2 => 'a10'), $array);
	}

}
