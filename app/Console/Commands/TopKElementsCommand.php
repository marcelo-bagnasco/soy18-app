<?php

namespace App\Console\Commands;

use App\Services\TopKElements;
use Exception;
use Illuminate\Console\Command;

class TopKElementsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:top-k-elements {k} {elements}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Top K Elements command, first argument is the number of top elements while second argument y a the list of comma separated elements';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $k = $this->argument('k');
        $elements = $this->argument('elements');

        $elementsArray = explode(',', $elements);

        try {
            $topKElementsObj = new TopKElements($k, $elementsArray);

            echo "Elements: \n";
            print_r($elementsArray);

            $resultArray = $topKElementsObj->process();
            echo "Result: \n";
            print_r($resultArray);
        } catch (Exception $e) {
            echo "Sorry, we encountered a problem with you request: ".$e->getMessage();
        }
    }
}
