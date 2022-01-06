<?php

namespace App\Helpers;

use App\Helpers\SortInterface;

class BubbleSort implements SortInterface
{
    const ASCENDING = 1;
    const DESCENDING = 0;

    protected array $collection;
    protected int $order;

    public function __construct(array $collection, int $order = self::ASCENDING)
    {
        $this->collection = $collection;
        $this->order = $order;
    }

    public function sort(): array
    {
        return  $this->order == self::ASCENDING ? 
                $this->ascendingSort($this->collection) :
                $this->descendingSort($this->collection);  
    }

    protected function descendingSort(array $collection) : array 
    {
        $len = count($collection);

        for ($i = 0; $i < $len; $i++)
        {
            $swapped = false;
            for ($j = 0; $j < $len - 1; $j++)
            {
                if ($collection[$j] < $collection[$j + 1])
                {
                    $temp = $collection[$j + 1];
                    $collection[$j + 1] = $collection[$j];
                    $collection[$j] = $temp;

                    $swapped = true;
                }
            }

            if (!$swapped) break;
        }
        return $collection;
    }

    protected function ascendingSort(array $collection) : array 
    {
        $len = count($collection);

        for ($i = 0; $i < $len; $i++)
        {
            $swapped = false;
            for ($j = 0; $j < $len - 1; $j++)
            {
                if ($collection[$j] > $collection[$j + 1])
                {
                    $temp = $collection[$j + 1];
                    $collection[$j + 1] = $collection[$j];
                    $collection[$j] = $temp;

                    $swapped = true;
                }
            }
            if (!$swapped) break;
        }
        return $collection;
    }
}