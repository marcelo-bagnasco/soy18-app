<?php

namespace App\Http\Middleware;

use Closure;

class ItemQuantityDiscountMiddleware
{
    protected int $discount2Apply = 5; // This value needs to be moved to a config value or a configuration table
    protected int $itemQty2Apply = 3; // This value needs to be moved to a config value or a configuration table

    public function handle($request, Closure $next)
    {
        $basketItems = $request->basketItems;
        $basketItems = $this->applyItemQuantityDiscount($basketItems);
        $request->merge(['basketItems' => $basketItems]);

        return $next($request);
    }

    private function applyItemQuantityDiscount($basketItems)
    {
        $newBasketItems = [];
        foreach ($basketItems as $basketItem) {
            if ($basketItem['qty'] >= $this->itemQty2Apply) {
                $basketItem['price'] = $basketItem['price'] * ((100 - $this->discount2Apply) / 100);
            }
            $newBasketItems[] = $basketItem;
        }
        return $newBasketItems;
    }
}
