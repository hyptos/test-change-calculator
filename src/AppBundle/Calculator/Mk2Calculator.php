<?php

namespace AppBundle\Calculator;

class Mk2Calculator implements CalculatorInterface
{

    /**
     * @return string Indicates the model of automaton
     */
    public function getSupportedModel(): string
    {
        return 'mk2';
    }

    /**
     * @param int $amount The amount of money to turn into change
     *
     * @return \AppBundle\Model\Change|null The change, or null if the operation is impossible
     */
    public function getChange(int $amount): ?\AppBundle\Model\Change
    {
        $floatResteBill10 = $amount % 10;
        $intBill10 = floor($amount / 10);

        $floatResteBill5 = $floatResteBill10 % 5;
        $intBill5 = floor($floatResteBill10 / 5);

        $intResteCoin2 = $floatResteBill5 % 2;
        $intCoin2 = floor($floatResteBill5 / 2);

        $objChange = null;
        if($intResteCoin2 === 0) {
            $objChange = new \AppBundle\Model\Change(0, $intCoin2, $intBill5, $intBill10);
        }
        return $objChange;
    }
}