<?php
class Manager {
    protected $_db;

    CONST HOST = "localhost";
    CONST DBNAME = "noraecheck";
    CONST LOGIN = "root";
    CONST PWD = "";
    
    // constructor
    function __construct() {
        $host = self::HOST;
        $dbname = self::DBNAME;
        $this->_db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", self::LOGIN, self::PWD);
    }

    
}

    