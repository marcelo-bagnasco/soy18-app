<?php

namespace App\Http\Middleware;

use Closure;

class AgeDiscountMiddleware
{
    protected int $discount2Apply = 15;  // This value needs to be moved to a config value or a configuration table
    protected int $age2ApplyDiscount = 21; // This value needs to be moved to a config value or a configuration table

    public function handle($request, Closure $next)
    {
        $user = $request->user();
        // Apply 15% discount if the user is less than 21 years old
        if ($user && $user->age < $this->age2ApplyDiscount) {
            $basketItems = $request->basketItems;
            $basketItems = $this->applyAgeDiscount($basketItems);
            $request->merge(['basketItems' => $basketItems]);
        }

        return $next($request);
    }

    private function applyAgeDiscount($basketItems): array
    {
        $newBasketItems = [];
        foreach ($basketItems as $basketItem) {
            $basketItem['price'] = $basketItem['price'] * ((100 - $this->discount2Apply) / 100);
            $newBasketItems[] = $basketItem;
        }
        return $newBasketItems;
    }
}
