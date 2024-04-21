<?php

namespace App\Http\Controllers;

use App\Services\BasketService;
use App\Services\FizzBuzz;
use App\Services\LongestSequence;
use App\Services\TopKElements;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $basketAmountBeforeDiscounts;

    public function __construct()
    {
        // I add the basketItems to the request in order to be used in the Middleware, I need to implement a better solution
        $basketItems = [
            [
                'id' => 1,
                'item' => 121,
                'description' => 'Mouse pad',
                'qty' => 1,
                'price' => 20,
            ],
            [
                'id' => 2,
                'item' => 143,
                'description' => 'Monitor',
                'qty' => 2,
                'price' => 40,
            ],
            [
                'id' => 3,
                'item' => 135,
                'description' => 'Notebook Lenovo',
                'qty' => 1,
                'price' => 60,
            ],
            [
                'id' => 4,
                'item' => 34,
                'description' => 'Keyboard',
                'qty' => 4,
                'price' => 10,
            ],
        ];

        request()->merge(['basketItems' => $basketItems]);

        $basket = new BasketService($basketItems);
        $this->basketAmountBeforeDiscounts = $basket->totalAmount();
    }

    public function fizzBuzz($number)
    {
        echo 'Number: '.$number."<hr>";
        $fizzBuzzObj = new FizzBuzz();
        $fizzBuzzObj->setLength($number);
        $result = $fizzBuzzObj->process();

        echo 'Result:<br>';
        echo "<pre>";
        print_r($result);
        echo "</pre>";
    }

    public function topKelements($k, $elements)
    {
        $elementsArray = explode(',', $elements);

        try {
            $topKElementsObj = new TopKElements($k, $elementsArray);
            echo 'Elements: ';
            echo "<pre>";
            print_r($elementsArray);
            echo "</pre>";
            echo "<hr>";

            $solutionArr = $topKElementsObj->process();
            echo "Result: <br>";
            echo "<pre>";
            print_r($solutionArr);
            echo "</pre>";
        } catch (Exception $e) {
            dd('Sorry, we encountered a problem with you request: '.$e->getMessage());
        }
    }

    public function longestSequence($elements)
    {
        $elementsArray = explode(',', $elements);

        try {
            $LSObj = new LongestSequence($elementsArray);
            $longestSequence = $LSObj->process();

            echo 'Elements: ';
            echo "<pre>";
            print_r($elementsArray);
            echo "</pre>";
            echo "Longest Sequence: ".$longestSequence;
        } catch (Exception $e) {
            dd('Sorry, we are unable to process your request: '.$e->getMessage());
        }
    }

    public function basketPrice()
    {
        $basket = new BasketService(request()->basketItems);
        $finalPrice = $basket->totalAmount();

        echo "Basket price before discount applied: $".$this->basketAmountBeforeDiscounts."<br>";
        echo "The actual final price of your basket is: $".$finalPrice;
    }
}
