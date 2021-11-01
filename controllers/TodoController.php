<?php

    class TodoController extends Todo {
        public $id;
        public $todo;
        public function __construct($id) {
            $this->getTodoView();
            $this->id = $id;
            $this->getTodosByUserId($id);
        }

        public function getTodoView() {
            include 'views/todoView.php';
        }
    }