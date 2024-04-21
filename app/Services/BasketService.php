<?php

namespace App\Services;

class BasketService
{
    protected array $basketContent;

    public function __construct(array $basketItems)
    {
        $this->basketContent = $basketItems;
    }

    public function totalAmount(): float|int
    {
        $totalAmount = 0;
        foreach ($this->basketContent as $basketItem) {
            if (isset($basketItem['price']) && is_numeric($basketItem['price'])) {
                $totalAmount += $basketItem['price'] * $basketItem['qty'];
            }
        }

        return $totalAmount;
    }
}
