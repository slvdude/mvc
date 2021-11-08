<?php

class Todo extends Dbh {

    function __construct() {
        $this->conn = $this->connect();
    }
    
    public function createTodo($userId, $title) {
       $stmt = $this->conn->prepare('INSERT INTO tasks (`user_id`, `description`, `status`) VALUES (?, ?, ?);');
       $stmt->execute(array($userId, $title , 0));
    }

    public function getTodosByUserId($userId) {
        $stmt = $this->conn->prepare("SELECT * FROM tasks WHERE `user_id` = ?;");
        $stmt->execute(array($userId)); 
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);   
        return $result;
    }

    public function deleteTodoById($id) {
        $stmt = $this->conn->prepare('DELETE FROM tasks WHERE `id` = ?;');
        $stmt->execute(array($id));
    }

    public function deleteTodos($user_id) {
        $stmt = $this->conn->prepare('DELETE FROM tasks WHERE `user_id` = ?;');
        $stmt->execute(array($user_id));
    }

    private function getTodos($id) {
        $stmt = $this->conn->prepare('SELECT * FROM tasks WHERE `id` = ?;');
        $stmt->execute(array($id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function changeTodoStatus($id) {
        $todos = $this->getTodos($id);
        if($todos['status'] == 0) {
            $stmt = $this->conn->prepare('UPDATE tasks SET status = 1 WHERE `id` = ?;');
            $stmt->execute(array($id));
        }
        else {
            $stmt = $this->conn->prepare('UPDATE tasks SET status = 0 WHERE `id` = ?;');
            $stmt->execute(array($id));
        }
    }

    public function doneAll($user_id) {
        $stmt = $this->conn->prepare('UPDATE tasks SET status = 1 WHERE `user_id` = ?');
        $stmt->execute(array($user_id));
    }
}
