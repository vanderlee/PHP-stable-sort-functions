<?php

class edgeCasesTest extends PHPUnit_Framework_TestCase
{
    public static function compareThrowing($a, $b)
    {
        throw new Exception('Comparator failed');
    }

    public static function compareKeys($a, $b)
    {
        return strcmp($a, $b);
    }

    /**
     * @covers StableSort::asort
     * @group stablesort
     */
    public function testAsortUsesRequestedStringComparisonForEquality()
    {
        $array = array(
            'scientific' => '0e1',
            'integer' => 0,
        );

        StableSort::asort($array, SORT_STRING);

        $this->assertSame(array(
            'integer' => 0,
            'scientific' => '0e1',
        ), $array);
    }

    /**
     * @covers StableSort::arsort
     * @group stablesort
     */
    public function testArsortUsesRequestedStringComparisonForEquality()
    {
        $array = array(
            'integer' => 0,
            'scientific' => '0e1',
        );

        StableSort::arsort($array, SORT_STRING);

        $this->assertSame(array(
            'scientific' => '0e1',
            'integer' => 0,
        ), $array);
    }

    /**
     * @covers StableSort::usort
     * @group stablesort
     */
    public function testUsortLeavesInputUntouchedWhenComparatorThrows()
    {
        $source = array(
            array('first', 2),
            array('second', 1),
        );
        $array = $source;

        try {
            StableSort::usort($array, array(__CLASS__, 'compareThrowing'));
            $this->fail('Expected the comparator exception to be propagated.');
        } catch (Exception $exception) {
            $this->assertSame('Comparator failed', $exception->getMessage());
        }

        $this->assertSame($source, $array);
    }

    /**
     * @covers StableSort::uasort
     * @group stablesort
     */
    public function testUasortLeavesInputUntouchedWhenComparatorThrows()
    {
        $source = array(
            'first' => array('first', 2),
            'second' => array('second', 1),
        );
        $array = $source;

        try {
            StableSort::uasort($array, array(__CLASS__, 'compareThrowing'));
            $this->fail('Expected the comparator exception to be propagated.');
        } catch (Exception $exception) {
            $this->assertSame('Comparator failed', $exception->getMessage());
        }

        $this->assertSame($source, $array);
    }

    /**
     * @covers StableSort::uksort
     * @group stablesort
     */
    public function testUksortAcceptsEmptyArray()
    {
        $array = array();

        $this->assertTrue(StableSort::uksort($array, array(__CLASS__, 'compareKeys')));
        $this->assertSame(array(), $array);
    }
}
