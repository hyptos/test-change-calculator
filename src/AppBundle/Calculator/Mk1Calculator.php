<?php

declare(strict_types=1);

namespace AppBundle\Calculator;

class Mk1Calculator implements CalculatorInterface
{
    /**
     * @return string Indicates the model of automaton
     */
    public function getSupportedModel(): string
    {
        return 'mk1';
    }

    /**
     * @param int $amount The amount of money to turn into change
     *
     * @return \AppBundle\Model\Change|null The change, or null if the operation is impossible
     */
    public function getChange(int $amount): ?\AppBundle\Model\Change
    {
        $intResult = floor($amount / 1);
        $objChange = new \AppBundle\Model\Change($intResult, 0, 0, 0);

        return $objChange;
    }
}
