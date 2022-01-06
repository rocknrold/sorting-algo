<?php

namespace App\Helpers;

use App\Helpers\SortInterface;

class QuickSort implements SortInterface
{
    protected array $collection; 
    protected int $low;
    protected int $high;

    public function __construct(array $collection)
    {
        $this->collection = $collection;
        $this->low = 0;
        $this->high = sizeof($collection) - 1;
    }
    
    public function sort() : array
    {
        $this->quickSort($this->collection,$this->low, $this->high);

        return $this->collection;
    }

    protected function quickSort(array &$arr, int $low, int $high)
    {
        if ($low < $high)
        {
            $pivot = $this->partition($arr, $low, $high);
            $this->quickSort($arr, $low, $pivot);
            $this->quickSort($arr, $pivot + 1, $high);
        }
    }

    protected function partition(array &$arr, int $low, int $high)
    {
        $pivot =  $arr[$low];
        $i = $low;
        $j = $high;

        while ($i < $j)
        {
            while ($arr[$i] <= $pivot && $i < $high)
            {
                $i++;
            }
            
            while ($arr[$j] > $pivot && $j > $low)
            {
                $j--;
            }

            if ($i < $j)
            {
                $temp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $temp;
            }
        }

        $arr[$low] = $arr[$j];
        $arr[$j] = $pivot;

        return $j;
    }
}