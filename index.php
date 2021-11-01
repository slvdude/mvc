<?php 
    session_start();
    header("Content-Type:text/html;charset=UTF-8");
    include 'includes/autoloader.php';


    $class = 'AuthPageContr';	

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
            $class = new TodoController();
        } 
        else if ($auth->signupUser() == true) {
            $auth->authUser();
            $class = new TodoController();
        } 
        else {
            echo 'auth failed';
        }
    }
?>