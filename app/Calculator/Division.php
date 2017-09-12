<?php

namespace App\Calculator;


use App\Calculator\Exceptions\NoOperandsException;


class Division extends OperationAbstract implements OperationInterface
{
    public function calculate()
    {
        if(empty($this->operands)) {
            throw new NoOperandsException("No operands passed", 1);
        }

        return array_reduce(array_filter($this->operands), function ($a, $b) {
            if ($a !== null && $b !== null) {
                return $a / $b;
            }

            return $b;
        }, null);
    }
}
