<?php

    class TodoController extends Todo {
        public $userId;
        public $todo;

        public function __construct($id) {
            $this->userId = $id;
        }

        public function getAllTodos() {
            return $this->getTodosByUserId($this->userId);
        }

        public function getTodoView() {
            include 'views/todoView.php';
        }
    }