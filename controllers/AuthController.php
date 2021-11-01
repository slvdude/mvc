<?php 

    class AuthController extends Auth {
        private $login;
        private $password;

        public function __construct($login, $password) {
            $this->login = $login;
            $this->password = $password;
        }

        public function signupUser() {
            if($this->inputEmpty() == true) {
                $userSet = $this->setUser($this->login, $this->password);
                return $userSet;
            }
            else {
                header("Location: ../index.php?error=inputempty");
            }
        }

        public function authUser() {
            return $this->userExist($this->login, $this->password);
        }
        
        private function inputEmpty() {
            $isEmpty = true;
            if(empty($this->login) || empty($this->password)) {
                $isEmpty = false;
            }
            return $isEmpty;
        }
    }