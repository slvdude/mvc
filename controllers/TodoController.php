<?php

class TodoController extends Todo {
    
    private function getAllTodos($id) {
        $todoArr = $this->getTodosByUserId($id);
        return $todoArr;
    }

    public function getTodoView() {
        $todoArr = $this->getAllTodos($_SESSION['user_id']);
        include 'views/body.php';
        include "views/todoView.php";
    }

    public function addTodo() {
        $title = $_POST['title'];
        $this->createTodo($_SESSION['user_id'], $title);
        header('Location: index.php?controller=TodoController&action=getTodoView');
    }

    public function deleteAllTodos() {
        $this->deleteTodos($_SESSION['user_id']);
        header('Location: index.php?controller=TodoController&action=getTodoView');
    }

    public function doneAllTodos() {
        $this->doneAll($_SESSION['user_id']);
        header('Location: index.php?controller=TodoController&action=getTodoView');
    }

    public function deleteTodo() {
        $this->deleteTodoById($_POST['todo_id']);
        header('Location: index.php?controller=TodoController&action=getTodoView');
    }

    public function doneTodo() {
        $this->changeTodoStatus($_POST['todo_id']);
        header('Location: index.php?controller=TodoController&action=getTodoView');
    }
}