<?php

namespace App\Services;

use Exception;

class TopKElements
{
    protected int $k;
    protected array $elements;

    public function __construct(int $k, array $elements)
    {
        if ($k < 1) {
            throw new Exception('Invalid Top number elements, must be > than 0');
        }
        if (count($elements) == 0) {
            throw new Exception('Elements array must by a non empty array');
        }

        $this->k = $k;
        $this->elements = $elements;
    }

    public function process(): array
    {
        $countedArray = $this->getCountedArray();

        if (count($countedArray) < $this->k) {
            throw new Exception('Invalid Top number elements, must be <= than unique numbers ('.count($countedArray).')');
        }

        $bucketsArray = $this->prepareBuckets($countedArray);

        $result = [];
        for ($i = count($bucketsArray) - 1; $i >= 0; $i--) {
            if (!empty($bucketsArray[$i])) {
                $result = array_merge($result, $bucketsArray[$i]);
            }
            if (count($result) >= $this->k) {
                break;
            }
        }

        return array_slice($result, 0, $this->k);
    }

    private function getCountedArray(): array
    {
        $countedArr = [];
        foreach ($this->elements as $number) {
            $countedArr[$number] = (!isset($countedArr[$number]) ? 1 : $countedArr[$number] + 1);
        }

        return $countedArr;
    }

    private function prepareBuckets(array $countedArray): array
    {
        $buckets = array_fill(0, max($countedArray) + 1, []);

        foreach ($countedArray as $num => $frequency) {
            $buckets[$frequency][] = $num;
        }

        return $buckets;
    }
}
