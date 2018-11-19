<?php

declare(strict_types=1);

namespace AppBundle\Model;

class Money {
    private $nom;
    private $value;
    private $amount;

    public function __construct($nom, $value, $amount = 0)
    {
        $this->nom = $nom;
        $this->value = $value;
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    public function setChange($amount) {
        $this->amount = floor($amount / $this->getValue());
        return $amount % $this->getValue();
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }


}