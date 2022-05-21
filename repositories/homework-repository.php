<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$connection = mysqli_connect("localhost", "root", "", "aca");

function getAll() {

  global $connection;

  $query = "select * from homework;";
  $stmt = mysqli_stmt_init($connection);

  if(!mysqli_stmt_prepare($stmt, $query)){
    throw new Exception();
    exit();
  }else {
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
  return new homework($row['homework_id'], $row['homework_name'], $row['homework_description'],$row['homework_max_points'],$row['homework_created_at'],$row['homework_deadline'],$row['homework_created_by']);
}

function find($id)
{
    global $connection;
    $query = "select * from homework where homework_id = ?";
    $stmt = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        throw new Exception();
    } else {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            $homework = fromFetchAssoc($row);
        }
        return $homework;
    }
    return null;
}



function findTeacher($homework_id , $teacher_id) {

  $query = "select * from homework, teacher
            where teacher_id = homework_created_by and teacher_id = ? and homework_id = ?";
  global $connection;
  $stmt = mysqli_stmt_init($connection);

  if(!mysqli_stmt_prepare($stmt, $query)){
    throw new Exception();
  }else {
    mysqli_stmt_bind_param($stmt, "ii", $teacher_id, $homework_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result)){
      return $row['teacher_name'];
    }

  }
}


