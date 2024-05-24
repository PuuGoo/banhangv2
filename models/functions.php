<?php

function class_autoLoader($classname)
{

    $classname = strtolower($classname);
    $path = "models/{$classname}.php";

    if (!class_exists($classname)) {

        include_once $path;
    }
}

function redirect($location)
{
    header("location:" . ROOT_URL . $location);
}

spl_autoload_register('class_autoLoader');
