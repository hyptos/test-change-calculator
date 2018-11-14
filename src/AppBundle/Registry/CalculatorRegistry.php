<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 14/11/2018
 * Time: 21:44
 */

namespace AppBundle\Registry;


use AppBundle\Calculator\CalculatorInterface;

class CalculatorRegistry implements CalculatorRegistryInterface
{

    /**
     * @param string $model Indicates the model of automaton
     *
     * @return CalculatorInterface|null The calculator, or null if no CalculatorInterface supports that model
     */
    public function getCalculatorFor(string $model): ?CalculatorInterface
    {
        $arrClass = class_implements('CalculatorInterface');
        foreach ($arrClass as $class) {
            return new $class();
        }

        return null;
    }
}