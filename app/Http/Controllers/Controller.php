<?php

namespace App\Http\Controllers;

use App\Services\FizzBuzz;
use App\Services\TopKElements;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

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

}
