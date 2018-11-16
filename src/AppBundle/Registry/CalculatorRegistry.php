<?php

declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 14/11/2018
 * Time: 21:44
 */

namespace AppBundle\Registry;

use AppBundle\Calculator\CalculatorInterface;
use AppBundle\Calculator\Mk1Calculator;
use AppBundle\Calculator\Mk2Calculator;

class CalculatorRegistry implements CalculatorRegistryInterface
{
    /**
     * @param string $model Indicates the model of automaton
     *
     * @return CalculatorInterface|null The calculator, or null if no CalculatorInterface supports that model
     */
    public function getCalculatorFor(string $model): ?CalculatorInterface
    {


	if ($model == 'mk1') return new Mk1Calculator();
	if ($model == 'mk2') return new Mk2Calculator();


        return null;
    }
}
