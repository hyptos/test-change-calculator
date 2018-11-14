<?php

declare(strict_types=1);

namespace AppBundle\Controller;

use AppBundle\Model\Change;
use AppBundle\Registry\CalculatorRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * Matches /automaton/
     *
     * @Route("/automaton/{calculator}/change{amount}", name="automaton")
     * @param mixed $calculator
     * @param mixed $amount
     * @return false|string
     */
    public function automaton($calculator, $amount){
        $CalculatorRegistry = new CalculatorRegistry();
        $objCalculator = $CalculatorRegistry->getCalculatorFor($calculator);
        $objChange = new Change(0,0,0,0);
        if ($objCalculator !== null) {
            $objChange = $objCalculator->getChange($amount);
        }
        return json_encode($objChange);
    }
}
