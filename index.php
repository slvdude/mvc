<?php 
    session_start();
    include 'includes/autoloader.php';
    if(isset($_POST['submit'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $auth = new AuthController($login, $password);
        if($auth->authUser() == true) {
            echo 'log in';
        } 
        else if ($auth->signupUser() == true) {
            $auth->authUser();
            echo 'sign up and log in'; 
        } 
        else {
            echo 'error';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form action="index.php" method="post">
                <h2>Sign in</h2>
                <input type="text" name="login" placeholder="Login"><br>
                <input type="password" name="password" placeholder="Password"><br>
                <button type="submit" name="submit">Sign in</button><br>
            </form>
        </div>
    </div>
</body>
</html>