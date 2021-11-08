<?php

class TodoController {
    
    function __construct() {
        $this->todo = new Todo();
    } 

    public function getAllTodos($id) {
        $todoArr = $this->todo->getTodosByUserId($id);
        return $todoArr;
    }

    public function getTodoView() {
        $todoArr = $this->getAllTodos($_SESSION['user_id']);
        include 'views/body.php';
        include "views/todoView.php";
    }

    public function addTodo() {
        $title = $_POST['title'];
        $this->todo->createTodo($_SESSION['user_id'], $title);
        header('Location: index.php?controller=TodoController&action=getTodoView');
    }

    public function deleteAllTodos() {
        $this->todo->deleteTodos($_SESSION['user_id']);
        header('Location: index.php?controller=TodoController&action=getTodoView');
    }

    public function doneAllTodos() {
        $this->todo->doneAll($_SESSION['user_id']);
        header('Location: index.php?controller=TodoController&action=getTodoView');
    }

    public function deleteTodo() {
        $this->todo->deleteTodoById($_POST['todo_id']);
        header('Location: index.php?controller=TodoController&action=getTodoView');
    }

    public function doneTodo() {
        $this->todo->changeTodoStatus($_POST['todo_id']);
        header('Location: index.php?controller=TodoController&action=getTodoView');
    }
}