<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("../database/db.php");


function findAll() {

  $query = "select * from student;";
  $students = [];
  global $connection;
  $stmt = mysqli_stmt_init($connection);

  if(!mysqli_stmt_prepare($stmt, $query)){
    throw new Exception();
  }else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while($row = mysqli_fetch_assoc($result)){
      $students[] = $row;
    }
  }

  return $students;
}



