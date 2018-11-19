<?php

declare(strict_types=1);

namespace AppBundle\Calculator;

use AppBundle\Model\Change;
use AppBundle\Model\Money;

class Mk2Calculator implements CalculatorInterface
{

    private $objChange;

    public function __construct($objChange)
    {
        $this->objChange = $objChange;
    }
    
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
     * @return Change|null The change, or null if the operation is impossible
     */
    public function getChange(int $amount): ?Change
    {
        $startAmount = $amount;
        $arrAttributes = get_object_vars($this->objChange);

        foreach($arrAttributes as $strAttribute => $objMoney) {
            /** @var Money $objMoney */
            if($objMoney !== null && $objMoney instanceof Money) {
                if($objMoney->getNom() == $strAttribute) {
                    $startAmount = $objMoney->setChange($startAmount);
                }
            }
        }

        if ($startAmount !== 0) return null;

        return $this->objChange;
    }
}
