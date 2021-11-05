<?php
    spl_autoload_register('myAutoLoader');

    function myAutoLoader($c) {
        if(file_exists("models/".$c.".php")) {
            require_once "models/".$c.".php";   
        }
        if(file_exists("views/".$c.".php")) {
            require_once "views/".$c.".php";   
        }
        if(file_exists("controllers/".$c.".php")) {
            require_once "controllers/".$c.".php";
        }
    }
?>