<?php

namespace Tests\AppBundle\Calculator;

use AppBundle\Calculator\CalculatorInterface;
use AppBundle\Model\Change;
use AppBundle\Calculator\Mk2Calculator;
use PHPUnit\Framework\TestCase;
use AppBundle\Model\Money;

class Mk2CalculatorTest extends TestCase
{
    /**
     * @var CalculatorInterface
     */
    private $calculator;
    private $change;

    protected function setUp()
    {
        $objChange = new Change([new Money('coin2', 2, 0), new Money('bill5', 5, 0), new Money('bill10', 10, 0)]);
        $this->change = $objChange;
        $this->calculator = new Mk2Calculator($objChange);
    }

    public function testGetSupportedModel()
    {
        $this->assertEquals('mk2', $this->calculator->getSupportedModel());
    }

    public function testGetChangeEasy()
    {
        $change = $this->calculator->getChange(2);
        $this->assertInstanceOf(Change::class, $change);
        $objChange = clone $this->change;
        $objChange->coin2 = new Money('coin2', 2, 1);
        $objChange->bill5 = new Money('bill5', 5, 0);
        $objChange->bill10 = new Money('bill10', 10, 0);
        $this->assertTrue($objChange == $change);
    }


        public function testGetChangeImpossible()
        {
            $change = $this->calculator->getChange(1);
            $this->assertNull($change);
        }

        public function testGet10(){
            $change = $this->calculator->getChange(10);
            $objChange = clone $this->change;
            $objChange->bill10 = new Money('bill10', 10, 1);
            $this->assertInstanceOf(Change::class, $change);
            $this->assertTrue($objChange == $change);
        }

        public function testGet5(){
            $change = $this->calculator->getChange(5);
            $objChange = clone $this->change;
            $objChange->bill5 = new Money('bill5', 5, 1);
            $this->assertInstanceOf(Change::class, $change);
            $this->assertTrue($objChange == $change);
        }

        public function testGet2(){
            $change = $this->calculator->getChange(2);
            $objChange = clone $this->change;
            $objChange->coin2 = new Money('coin2', 2, 1);
            $this->assertInstanceOf(Change::class, $change);
            $this->assertTrue($objChange == $change);
        }

        public function testGetChangeHard() {
            $change = $this->calculator->getChange(17);
            $objChange = clone $this->change;
            $objChange->bill10 = new Money('bill10', 10, 1);
            $objChange->bill5 = new Money('bill5', 5, 1);
            $objChange->coin2 = new Money('coin2', 2, 1);
            $this->assertInstanceOf(Change::class, $change);
            $this->assertTrue($objChange == $change);
        }

}