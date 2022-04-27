<?php

namespace App\Catalog\Exception;

class AmountBelowZero extends \InvalidArgumentException
{
    public static function fromInt(int $amountInCents): self
    {
        return new self('Money amount cannot be below zero, ' . $amountInCents . ' given',);
    }


}