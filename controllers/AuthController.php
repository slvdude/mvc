<?php 

    class AuthController extends Auth {

        public function getForm() {
            include 'views/body.php';
            include 'views/authForm.php';
        }

        public function signupUser($login, $password) {
            if($this->inputEmpty() == false) {
                if($this->setUser($login, $password) == true) {
                    header('Location: index.php?controller=TodoController&action=getTodoView');
                }
                else {
                    header('Location: index.php?error=login-exist');
                }
            } else {
                header('Location: index.php?error=input-empty');
            }
        }

        public function authUser() {
            $login = $_POST['login'];
            $password = $_POST['password'];
            if($this->userExist($login, $password) == true) {
                header('Location: index.php?controller=TodoController&action=getTodoView');
            }
            else {
                $this->signupUser($login, $password);
            }
        }

        public function logout() {
            unset($_SESSION['user_id']);
            header('Location: index.php?controller=AuthController&action=getForm');
        }
        
        private function inputEmpty() {
            $isEmpty = false;
            if(empty($_POST['login']) || empty($_POST['password'])) {
                $isEmpty = true;
            }
            return $isEmpty;
        }
    }