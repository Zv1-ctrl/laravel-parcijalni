<?php

namespace App\Services;

use InvalidArgumentException;

class MathService{

    public function zbroj(int|float $a, int|float $b): int|float{
        return $a + $b;
    }

    public function produkt(int|float $a, int|float $b): int|float{
        return $a * $b;
    }

    public function razlika(int|float $a, int|float $b): int|float{
        return $a - $b;
    }

    public function kvocijent(int|float $a, int|float $b): int|float{

        if($b===0){
            throw new InvalidArgumentException("Dijeljenje s nulom nije dozvoljeno!");
        }
        return $a / $b;
    }

    public function ostatak(int|float $a, int|float $b): int|float{

        if($b===0){
            throw new InvalidArgumentException("Dijeljenje s nulom nije dozvoljeno!");
        }
        return $a % $b;
    }
}