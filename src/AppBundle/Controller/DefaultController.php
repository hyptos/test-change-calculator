<?php

declare(strict_types=1);

namespace AppBundle\Controller;

use AppBundle\Model\Change;
use AppBundle\Registry\CalculatorRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * Matches /automaton/
     *
     * @Route("/automaton/{calculator}/change/{amount}", name="automaton")
     *
     * @param mixed $calculator
     * @param mixed $amount
     *
     * @return false|string
     */
    public function automaton($calculator, $amount)
    {

        $CalculatorRegistry = new CalculatorRegistry();
        $objCalculator = $CalculatorRegistry->getCalculatorFor($calculator);

        if (null === $objCalculator) {
           return new Response('', Response::HTTP_NOT_FOUND);
        }

        $objChange = $objCalculator->getChange((int)$amount);
        if ($objChange == null) {
            return new Response('', Response::HTTP_NO_CONTENT);
        }

        return new JsonResponse($objChange);
    }
}
