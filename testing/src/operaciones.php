<?php

class Operations
{

    public function __construct()
    {
    }

    public function sum($n1, $n2)
    {
        if ($n1 === NULL || $n2 === NULL || !is_numeric($n1) || !is_numeric($n2)) throw new InvalidArgumentException('Value are not numeric');
        return $n1 + $n2;
    }

    public function div($n1, $n2)
    {
        if ($n1 === NULL || $n2 === NULL || !is_numeric($n1) || !is_numeric($n2)) throw new InvalidArgumentException('Value are not numeric');    
        if ($n2 == 0) throw new DivisionByZeroError();
        return $n1 / $n2;
    }
}
