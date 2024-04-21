<?php

namespace App\Console\Commands;

use App\Services\LongestSequence;
use Exception;
use Illuminate\Console\Command;

class LongestSequenceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:longest-sequence {elements}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Longest consecutive sequence command, input argument is a list of comma separated numbers';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $elements = $this->argument('elements');
        $elementsArray = explode(',', $elements);

        try {
            echo "Elements: \n";
            print_r($elementsArray);

            $LSObj = new LongestSequence($elementsArray);
            $result = $LSObj->process();
            echo "Result: ".$result;
        } catch (Exception $e) {
            echo "Sorry, we couldn't process your resquest: ".$e->getMessage();
        }
    }
}
