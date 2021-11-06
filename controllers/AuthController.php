<?php 

class AuthController extends Auth {

    public function getForm() {
        include 'views/body.php';
        include 'views/authForm.php';
    }

    private function signupUser($login, $password) {
        if($this->inputEmpty() == false) {
            if($this->setUser($login, $password) == true) {
                $this->authUser();
            }
            else {
                header('Location: index.php?error=login-exist');
            }
        } 
        else {
            header('Location: index.php?error=input-empty');
        }
    }

    public function authUser() {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $result = $this->userExist($login, $password);
        if($result !== false) {
            $_SESSION['user_id'] = $result;
            header('Location: index.php?controller=TodoController&action=getTodoView');
        }
        else {
            $this->signupUser($login, $password);
        }
    }

    public function logout() {
        header('Location: index.php');
    }
    
    private function inputEmpty() {
        $isEmpty = false;
        if(empty($_POST['login']) || empty($_POST['password'])) {
            $isEmpty = true;
        }
        return $isEmpty;
    }
}