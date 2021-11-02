<?php 
    session_start();
    header("Content-Type:text/html;charset=UTF-8");
    include 'includes/autoloader.php';

    $class = 'AuthPageContr';	

    if(class_exists($class)) {
		$obj = new $class;
		$obj->getAuthForm();
        if(isset($_POST['submit'])) {
            //Log/reg
            $login = $_POST['login'];
            $password = $_POST['password'];
            $auth = new AuthController($login, $password);
            if($auth->authUser() == true) {
                $class = 'TodoController';
                $user = $_SESSION['user_id'];
                $obj = new $class($user);
                $todoArr = $obj->getAllTodos();
                print_r($todoArr);
                $obj->getTodoView();
            } 
            else if ($auth->signupUser() == true) {
                $auth->authUser();
                $class = 'TodoController';
                $user = $_SESSION['user_id'];
                $obj = new $class($user);
                $todoArr = $obj->getAllTodos();
                $obj->getTodoView();
            } 
            else {
                echo 'auth failed';
            }
        }
	}
	else {
		exit();
	}
?>