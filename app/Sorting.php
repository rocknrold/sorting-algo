<?php

namespace App;

use App\Helpers\SortInterface;

class Sorting
{

    /**
     * SORTING ALGORITHM REGISTRATION
     * 
     * This array will hold the different sorting algorithm class
     * new algorithms will be put here for extension.
     * 
     * 
     * @var array
     */
    protected $sortRegistry = [
        'b' => \App\Helpers\BubbleSort::class,
        'q' => \App\Helpers\QuickSort::class,
        'm' => \App\Helpers\MergeSort::class
    ];

    /**
     * SORT EXECUTION
     * 
     * Simple dependency injection
     * 
     * This accepts any type of sorting algo that extends the
     * SortInterface. This is also responsible for output.
     * 
     * Currently there were no options to format the output
     * standard implode comma separated values are outputted
     * to the user after sort selection.
     * 
     */
    public function execSort(SortInterface $sort) : void
    {
        $sorted = $sort->sort();
        echo 'Output: '.implode(',',$sorted).' or '.implode('', $sorted). PHP_EOL;
    }

    /**
     * EXCECUTE WHICH TYPE OF ALGORITHM IS SELECTED
     * 
     * This utilizes the execSort function after selecting 
     * what type of algorithm to be used.
     */
    public function sortSelector(array $data, string $sortType)
    {
        $sort = $this->sortRegistry[$sortType];
        
        $this->execSort(new $sort($data));
    }
}