<?php

namespace App\Services;

class FizzBuzz
{
    protected array $resultArray;
    protected int $length;

    public function __construct()
    {
        $this->resultArray = [];
        $this->length = 10; // Default value for length is 10
    }

    public function setLength(int $n): void
    {
        $this->length = $n;
    }

    public function process(): array
    {
        for ($i = 1; $i <= $this->length; $i++) {
            $this->resultArray[$i] = $this->getResultNumber($i);
        }
        return $this->resultArray;
    }

    private function getResultNumber(int $i): int|string
    {
        $ret = '';
        if ($i % 3 === 0) {
            $ret = 'Fizz';
        }
        if ($i % 5 === 0) {
            $ret .= 'Buzz';
        }
        if (!$ret) {
            $ret = $i;
        }
        return $ret;
    }
}
