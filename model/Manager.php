<?php
class Manager {
    protected $_db;

    CONST HOST = "localhost";
    CONST DBNAME = "noraecheck";
    CONST LOGIN = "noraecheck-web";
    CONST PWD = "putYourRecordsOn1+";
    
    // constructor
    function __construct() {
        $host = self::HOST;
        $dbname = self::DBNAME;
        $this->_db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", self::LOGIN, self::PWD);
    }
}

    
