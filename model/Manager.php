<?php
    

    class Manager { 
        protected function dbConnect() {
            return new \PDO('mysql:host=localhost;dbname=noraecheck;charset=utf8', 'root', '');
        }
    }

    