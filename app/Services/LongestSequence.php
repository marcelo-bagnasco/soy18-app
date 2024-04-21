<?php

namespace App\Services;

use Exception;

class LongestSequence
{
    protected array $elements;

    public function __construct(array $elements)
    {
        if (count($elements) == 0) {
            throw new Exception('Elements array must be a non empty array!');
        }
        $this->elements = $elements;
    }

    public function process()
    {
        $keysArray = array_flip($this->elements);

        $sequenceCount = 0;
        foreach ($this->elements as $element) {
            if (!isset($keysArray[$element - 1])) {
                $actualCounter = $this->countSequence($element, $keysArray);
                $sequenceCount = max($sequenceCount, $actualCounter);
            }
        }

        return $sequenceCount;
    }

    private function countSequence($element, $sequenceArray): int
    {
        $counter = 0;
        for ($i = $element; isset($sequenceArray[$i]); $i++) {
            $counter++;
        }
        return $counter;
    }
}
