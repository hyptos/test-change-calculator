<?php

namespace Tests\AppBundle\Calculator;

use AppBundle\Calculator\CalculatorInterface;
use AppBundle\Model\Change;
use AppBundle\Calculator\Mk1Calculator;
use AppBundle\Model\Money;
use PHPUnit\Framework\TestCase;

class Mk1CalculatorTest extends TestCase
{
    /**
     * @var CalculatorInterface
     */
    private $calculator;

    protected function setUp()
    {
        $objChange = new Change([new Money('coin1', 1, 0)]);
        $this->calculator = new Mk1Calculator($objChange);
    }

    public function testGetSupportedModel()
    {
        $this->assertEquals('mk1', $this->calculator->getSupportedModel());
    }

    public function testGetChangeEasy()
    {
        $change = $this->calculator->getChange(2);
        $this->assertInstanceOf(Change::class, $change);
        $objChange = new Change([new Money('coin1', 1, 0)]);
        $objChange->coin1 = new Money('coin1', 1, 2);
        $this->assertTrue($objChange == $change);
    }
}