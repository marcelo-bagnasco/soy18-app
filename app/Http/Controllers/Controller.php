<?php

namespace App\Http\Controllers;

use App\Services\FizzBuzz;
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

}
