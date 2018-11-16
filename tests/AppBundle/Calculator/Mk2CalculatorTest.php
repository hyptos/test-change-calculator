<?php

namespace Tests\AppBundle\Calculator;

use AppBundle\Calculator\CalculatorInterface;
use AppBundle\Model\Change;
use AppBundle\Calculator\Mk2Calculator;
use PHPUnit\Framework\TestCase;

class Mk2CalculatorTest extends TestCase
{
    /**
     * @var CalculatorInterface
     */
    private $calculator;

    protected function setUp()
    {
        $this->calculator = new Mk2Calculator();
    }

    public function testGetSupportedModel()
    {
        $this->assertEquals('mk2', $this->calculator->getSupportedModel());
    }

    public function testGetChangeEasy()
    {
        $change = $this->calculator->getChange(2);
        $this->assertInstanceOf(Change::class, $change);
        $this->assertEquals(1, $change->coin2);
    }

    public function testGetChangeImpossible()
    {
        $change = $this->calculator->getChange(1);
        $this->assertNull($change);
    }

    public function testGet10(){
        $change = $this->calculator->getChange(10);
        $objChange = new Change(0,0,0,1);
        $this->assertInstanceOf(Change::class, $change);
        $this->assertTrue($objChange == $change);
    }

    public function testGet5(){
        $change = $this->calculator->getChange(5);
        $objChange = new Change(0,0,1,0);
        $this->assertInstanceOf(Change::class, $change);
        $this->assertTrue($objChange == $change);
    }

    public function testGet2(){
        $change = $this->calculator->getChange(2);
        $objChange = new Change(0,1,0,0);
        $this->assertInstanceOf(Change::class, $change);
        $this->assertTrue($objChange == $change);
    }

    public function testGetChangeHard() {
        $change = $this->calculator->getChange(12);
        $objChange = new Change(0,1,0,1);
        $this->assertInstanceOf(Change::class, $change);
        $this->assertTrue($objChange == $change);
    }
    
    public function testGetChange3() {
        $change = $this->calculator->getChange(3);
        $objChange = null;
        $this->assertTrue($objChange == $change);

    }
}
