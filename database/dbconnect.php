<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class db
{
    private $server;
    private $username;
    private $password;
    private $database;


    public function conn()
    {
        $this-> server = "localhost";
        $this-> username = "root";
        $this-> password = "";
        $this-> database = "aca";

        $conn = mysqli_connect($this->server, $this-> username, $this-> password, $this-> database);
        if (!$conn) {
            die("Unable to connect to database");
            return null;
        }
        return $conn;
    }
}
