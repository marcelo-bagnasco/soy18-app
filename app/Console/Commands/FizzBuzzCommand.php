<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\FizzBuzz;

class FizzBuzzCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fizz-buzz {number}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the Fizz Buzz excercise';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $number = $this->argument('number');
        $fizzBuzzObj = new FizzBuzz();
        $fizzBuzzObj->setLength($number);
        $return = $fizzBuzzObj->process();

        echo "Number: ".$number."\n";
        print_r($return);
    }
}
