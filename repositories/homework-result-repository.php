<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$connection = mysqli_connect("localhost", "root", "", "aca");


function getAll() {
      global $connection;
      $query = "select * from homework_result;";
      $stmt = mysqli_stmt_init($connection);

      if(!mysqli_stmt_prepare($stmt , $query)){
        throw new Exception();
      }else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $homework_results = array();

        while($row = mysqli_fetch_assoc($result)) {
          $homework_results[] = fromFetchAssoc($row);
        }
        return $homework_results;
      }
      return null;
  }

function fromFetchAssoc($row) {
    return new homework_result($row['hresult_id'], $row['hresult_student_id'], $row['hresult_points'], $row['delivered_on_time'],$row['hresult_date']);
}


function getName($id) {

  $query = "select homework_name from homework where homework_id = ?";
  global $connection;
  $stmt = mysqli_stmt_init($connection);

  if(!mysqli_stmt_prepare($stmt, $query)){
    throw new Exception();
  }else {
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result)){
      return $row['homework_name'];
    }
  }
  return null;
}


