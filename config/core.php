<?php
include_once "api/config/database.php";

$database = new Database();
$db = $database->getConnection();

spl_autoload_register(function ($class){
    $path = __DIR__."/".$class.".class.php";
    if(file_exists($path)){
        require_once $path;
    }
});