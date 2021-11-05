<?php 
    session_start();
    header("Content-Type:text/html;charset=UTF-8");
    include 'includes/autoloader.php';

    if($_GET['controller']) {
        $class = trim(strip_tags($_GET['controller']));
        $action = $_GET['action'];
    }
    else {
        $class = 'AuthController';
        $action = 'getForm';	
    }
    
    
    if(class_exists($class)) {
        $obj = new $class;
        $obj->$action();
    }
    else {
        exit('Something went wrong...');
    }
?>