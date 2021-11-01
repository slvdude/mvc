<?php 
    session_start();
    header("Content-Type:text/html;charset=UTF-8");
    include 'includes/autoloader.php';

    if($_GET['option']) {
        $class = trim(strip_tags($_GET['option']));
    }
    else {
        $class = 'AuthPageContr';	
    }

    if(class_exists($class)) {
		$obj = new $class;
		$obj->getAuthForm();
	}
	else {
		exit("<p>Нет данных для входа</p>");
	}

    if(isset($_POST['submit'])) {
        //Log/reg
        $login = $_POST['login'];
        $password = $_POST['password'];
        $auth = new AuthController($login, $password);
        if($auth->authUser() == true) {
            echo 'sign in successful'; 
        } 
        else if ($auth->signupUser() == true) {
            $auth->authUser();
            echo 'sign up successful';
        } 
        else {
            echo 'auth failed';
        }
    }
?>