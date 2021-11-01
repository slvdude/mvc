<?php

    class TodoController extends Todo {
        public function __construct() {
            $this->getTodoView();
        }

        public function getTodoView() {
            include 'views/todoView.php';
        }
    }