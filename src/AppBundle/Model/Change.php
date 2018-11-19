<?php

declare(strict_types=1);

namespace AppBundle\Model;

final class Change
{
    /**
     * Should be private but required in unit test
     *
     * @var int
     */
    public $bill10 = null;

    /**
     * Should be private but required in unit test
     *
     * @var int
     */
    public $bill5 = null;

    /**
     * Should be private but required in unit test
     *
     * @var int
     */
    public $coin2 = null;

    /**
     * Should be private but required in unit test
     *
     * @var int
     */
    public $coin1 = null;

    public function __construct($arrDistribution)
    {
        foreach($arrDistribution as $key => $value) {
            if ($value instanceof Money && property_exists($this, $value->getNom())) {
                $strProperty = $value->getNom();
                $this->$strProperty = $value;
            }
        }
    }

    public function isEqual(Change $obj)
    {
        return $this == $obj;
    }
}
