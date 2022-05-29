<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



class db
{

  public static function getConnection()
  {
    $connection = mysqli_connect("localhost", "root", "", "school");
    if (!$connection) {
      die("Unable to connect to database!");
      return null;
    }
    return $connection;
  }
}