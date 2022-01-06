<?php

/*
 | ABANDONED - OLD AUTOLOADER, REPLACED BY COMPOSER AUTOLOADER
 */

class AutoLoad
{
    public function __construct()
    {
        $this->loadClass();
    }


    protected function loadClass()
    {
        spl_autoload_register(function($class) {
             $path = __DIR__ . '/../' . $class . '.php';

            require $path;
        });
    }
}

// ACTUAL CALL TO THE CLASS AUTOLOADER
$loads = new AutoLoad();