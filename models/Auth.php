<?php 
class Auth extends Dbh {

    function __construct() {
        $this->conn = $this->connect();
    }

    protected function userExist($login, $password) {
        $stmt = $this->conn->prepare('SELECT * FROM users WHERE login = ? and password = ?;');
        $stmt->execute(array($login, $password));
        $returned_row = $stmt->fetch(PDO::FETCH_ASSOC);
        $result = false;
        if($stmt->rowCount() > 0) {
            $result = $returned_row['id'];
        }
        return $result;
    }

    protected function checkLogin($login) {
        $stmt = $this->conn->prepare('SELECT `login` FROM users WHERE login = ?;');
        $stmt->execute(array($login));
        $result = true;
        if($stmt->rowCount() > 0) {
            $result = false;
        }
        return $result;
    }

    protected function setUser($login, $password) {
        $isUserSet = false;
        if($this->checkLogin($login) == true) {
            $stmt = $this->conn->prepare('INSERT INTO users (`login`, `password`) VALUES (?, ?);');
            $stmt->execute(array($login, $password));
            $isUserSet = true;
        }
        return $isUserSet;
    }
}