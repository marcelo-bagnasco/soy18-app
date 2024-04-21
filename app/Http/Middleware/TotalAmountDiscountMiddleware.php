<?php

namespace App\Http\Middleware;

use Closure;

class TotalAmountDiscountMiddleware
{
    protected int $amount2Apply = 100; // This value needs to be moved to a config value or a configuration table
    protected int $discount2Apply = 20; // This value needs to be moved to a config value or a configuration table

    public function handle($request, Closure $next)
    {
        $basketItems = $request->basketItems;
        $basketItems = $this->applyTotalAmountDiscount($basketItems);
        $request->merge(['basketItems' => $basketItems]);

        return $next($request);
    }

    private function applyTotalAmountDiscount($basketItems)
    {
        $totalAmout = 0;
        foreach ($basketItems as $basketItem) {
            if (isset($basketItem['price']) && is_numeric($basketItem['price'])) {
                $totalAmout += $basketItem['price'] * $basketItem['qty'];
            }
        }

        if ($totalAmout > $this->amount2Apply) {
            $newBasketItems = [];
            foreach ($basketItems as $basketItem) {
                $basketItem['price'] = $basketItem['price'] * ((100 - $this->discount2Apply) / 100);
                $newBasketItems[] = $basketItem;
            }
        } else {
            $newBasketItems = $basketItems;
        }
        return $newBasketItems;
    }
}
