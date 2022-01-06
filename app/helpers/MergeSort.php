<?php

namespace App\Helpers;

use App\Helpers\SortInterface;

class MergeSort implements SortInterface
{
    protected array $collection;

    public function __construct(array $collection)
    {
        $this->collection = $collection;
    }

    public function sort() : array
    {
        return $this->mergeSort($this->collection);
    }

    protected function mergeSort(array $arr): array 
    {
        $len = count($arr);
        if ($len == 1) return $arr; //Array sorted
        
        $mid = (int) $len / 2;
        $left = $this->mergeSort(array_slice($arr, 0, $mid));
        $right = $this->mergeSort(array_slice($arr, $mid));
        
        return $this->merge($left, $right);
    }
       

    protected function merge(array $left, array $right): array
    {
        $combined = [];
        $countLeft = count($left);
        $countRight = count($right);
        $leftIndex = $rightIndex = 0;
        
        while ($leftIndex < $countLeft && $rightIndex < $countRight)
        {
            if ($left[$leftIndex] > $right[$rightIndex])
            {
                $combined[] = $right[$rightIndex];
                $rightIndex++;
            } else
            {
                $combined[] = $left[$leftIndex];
                $leftIndex++;
            }
        }
        
        while ($leftIndex < $countLeft)
        {
            $combined[] = $left[$leftIndex];
            $leftIndex++;
        }
        
        while ($rightIndex < $countRight)
        {
            $combined[] = $right[$rightIndex];
            $rightIndex++; 
        }
        
        return $combined;
    }
       
}