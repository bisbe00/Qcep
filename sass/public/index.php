<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include 'classes/config/Autoloader.php';
spl_autoload_register("Autoloader::load");
spl_autoload_register("Autoloader::newLoad");
spl_autoload_register("Autoloader::oldLoad");

// By using session_status() to check if a session is already active, 
// you can avoid calling session_start() redundantly.
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


try {
    $home = new FrontController();
    $home->dispatch();
} catch (Exception $e) {
    $errors = new ErrorView();
    $errors->show($e);
}
