<?php

/*
|--------------------------------------------------------------------------
| AARON HAROLD CARBONEL - TECHNICAL EXAM
|--------------------------------------------------------------------------
|
| Console application for different sorting algorithms available. 
| Includes: Bubble sort, Quick Sort, Merge Sort 
|
*/

// Require autoloading for classes 
require __DIR__ . '/vendor/autoload.php';

// Helpers and other class will be imported here...
use Symfony\Component\Console\Application;
use App\Commands\Sort;


/*
|--------------------------------------------------------------------------
| APPLICATION CONSOLE LAYOUT 
|--------------------------------------------------------------------------
|
| Commands output layout.
|
*/
echo "\e[0;30;43m.............................WELCOME...................................\e[0m".PHP_EOL;
echo "*\n \e[0;32mAARON HAROLD CARBONEL\e[0m - TECHNICAL EXAM FOR \e[1;31mDOTTYSTYLE CREATIVE\e[0m @2022".PHP_EOL;
echo "  Description: Applying sorting algorithms, with OOP \n*".PHP_EOL;
echo "---------------------------------------------------------".PHP_EOL;

/*
|--------------------------------------------------------------------------
| SYMPFONY COMMAND
|--------------------------------------------------------------------------
|
| php index.php command will run our applications and you can see the
| available commands provided by the application.
|
*/
$application = new Application();

// add our commands
$application->add(new Sort());

$application->run();