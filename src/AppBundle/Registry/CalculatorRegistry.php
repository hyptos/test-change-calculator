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

class CalculatorRegistry implements CalculatorRegistryInterface
{
    /**
     * @param string $model Indicates the model of automaton
     *
     * @return CalculatorInterface|null The calculator, or null if no CalculatorInterface supports that model
     *
     * @throws \ReflectionException
     */
    public function getCalculatorFor(string $model): ?CalculatorInterface
    {
        $strClassName = ucfirst($model) . 'Calculator';
        $strClassPath = __DIR__ . '/../Calculator/' . $strClassName . '.php';

        if (file_exists($strClassPath)) {
            try {
                $obj = new \ReflectionClass('\\AppBundle\Calculator\\' . $strClassName);
                /** @var CalculatorInterface $obj */
                $obj = $obj->newInstance();
            } catch (\LogicException $Exception) {
                return null;
            } catch (\ReflectionException $Exception) {
                return null;
            }

            return $obj;
        }

        return null;
    }
}
