<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$connection = mysqli_connect("localhost", "root", "", "aca");

function getAttached($studentId) {

  global $connection;

  $query = "select * from attached_homework where student_id = ?";
  $stmt = mysqli_stmt_init($connection);

  if(!mysqli_stmt_prepare($stmt, $query)){
    throw new Exception();
    exit();
  }else {
      mysqli_stmt_bind_param($stmt, "i" , $studentId);

      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);


      $homeworks = array();

      while($row = mysqli_fetch_assoc($result)){
        $homeworks[] = fromFetchAssoc($row);
      }
      return $homeworks;
  }
  return null;
}



function fromFetchAssoc($row) {
  return new attached_homework($row['attached_id'], $row['homework_id'], $row['subject_id'], $row['student_id'],
  $row['semester'], $row['homework_points'], $row['attached_date']);
}
