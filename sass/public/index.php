<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

include 'classes/config/Autoloader.php';
spl_autoload_register("Autoloader::load");
spl_autoload_register("Autoloader::newLoad");
spl_autoload_register("Autoloader::oldLoad");


try {
    $home = new FrontController();
    $home->dispatch();
} catch (Exception $e) {
    $errors = new ErrorView();
    $errors->show($e);
}
