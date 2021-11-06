<?php 
session_start();
header("Content-Type:text/html;charset=UTF-8");
include 'includes/autoloader.php';

if($_GET['controller']) {
    $class = trim(strip_tags($_GET['controller']));
    if($_GET['action']) {
        $action = $_GET['action'];
    }
    else {
        exit('There is no action');
    }
}
else {
    $class = 'AuthController';
    $action = 'getForm';	
}


if(class_exists($class)) {
    $obj = new $class;
    if(method_exists($obj, $action)) {
        $obj->$action(); 
    }
    else {
        exit('There is no such action');
    }
}
else {
    exit('Something went wrong...');
}
?>