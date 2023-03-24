<?php
spl_autoload_register('myAutoLoader');
function myAutoLoader($className)
{
    //$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $path = 'classes/';
    $extension = '.php';
    $fileName = $path . $className . $extension;

    if (!file_exists($fileName)) {
        return false;
    }
    include_once($path . $className . $extension);
}