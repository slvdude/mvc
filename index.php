<?php 
    session_start();
    header("Content-Type:text/html;charset=UTF-8");
    include 'includes/autoloader.php';

    if($_GET['AuthController']) {
        $class = trim(strip_tags($_GET['AuthController']));
    }
    else {
        $class = 'AuthPageContr'; 
    }

    if(class_exists($class)) {
		$obj = new $class;
		$obj->getBody();
	}
	else {
		exit();
	}
?>