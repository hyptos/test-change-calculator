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
    public $bill10 = 0;

    /**
     * Should be private but required in unit test
     *
     * @var int
     */
    public $bill5 = 0;

    /**
     * Should be private but required in unit test
     *
     * @var int
     */
    public $coin2 = 0;

    /**
     * Should be private but required in unit test
     *
     * @var int
     */
    public $coin1 = 0;

    public function __construct($coin1, $coin2, $bill5, $bill10)
    {
        $this->coin1 = $coin1;
        $this->coin2 = $coin2;
        $this->bill5 = $bill5;
        $this->bill10 = $bill10;
    }

    public function isEqual(Change $obj)
    {
        return $this == $obj;
    }
}
