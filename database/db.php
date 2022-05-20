<?php


$server = "localhost";
$username = "root";
$password = "";
$database = "aca";

$connection = mysqli_connect($server, $username, $password, $database);


if(!$connection){
  die("Unable to connect to database");
}
