<?php

class Database {

    private $conn;
    
    const SERVERNAME = "localhost";
    const USERNAME = "root";
    const PASSWORD = "";
    const DBNAME = "itqpdb";

    public function __construct() {
        $this->conn = new PDO("mysql:host=".Database::SERVERNAME.";dbname=".Database::DBNAME.";charset=utf8", Database::USERNAME, Database::PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }

    public function getConn() {
        return $this->conn;
    }

}

?>