<?php

namespace App\Exceptions;

use Exception;

class EmptyDataException extends Exception
{
    protected $message = "Data to be sorted cannot be empty, available format 1,3,4,2 || abcfzeq";
}