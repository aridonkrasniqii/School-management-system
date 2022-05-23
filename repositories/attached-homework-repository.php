<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$connection = mysqli_connect("localhost", "root", "", "aca");

function getAttached($studentId)
{

  global $connection;

  $query = "select * from attached_homework where student_id = ?";
  $stmt = mysqli_stmt_init($connection);

  if (!mysqli_stmt_prepare($stmt, $query)) {
    throw new Exception();
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "i", $studentId);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);


    $homeworks = array();

    while ($row = mysqli_fetch_assoc($result)) {
      $homeworks[] = fromFetchAssoc($row);
    }
    return $homeworks;
  }
  return null;
}



function fromFetchAssoc($row)
{
  return new attached_homework(
    $row['attached_id'],
    $row['homework_id'],
    $row['subject_id'],
    $row['student_id'],
    $row['semester'],
    $row['homework_points'],
    $row['attached_date']
  );
}

class attached_repository
{

  private $dbconn;
  private $connection;
  public function __construct()
  {
    $this->dbconn = new db();
    $this->connection = $this->dbconn->conn();
  }

  public function find($id)
  {
    $query = "select * from attached_homework where id = ?";
    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_bind_param($stmt, "i", $id);
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);

      if ($row = mysqli_fetch_assoc($result)) {
        return new attached($row['id'], $row['homework_id'], $row['subject_id'], $row['student_id'], $row['attached_date'], $row['description']);
      }
    }
  }
  public function create($model)
  {
    $query = "insert into attached_homework(homework_id,subject_id,student_id,description) values(?,?,?,?)";
    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {

      $homework_id = $model->getHomework_id();
      $student_id = $model->getStudent_id();
      $subject_id = $model->getSubject_id();
      $description = $model->getDescription();

      mysqli_stmt_bind_param($stmt, "iiis", $homework_id, $subject_id, $student_id, $description);
      if (mysqli_stmt_execute($stmt)) {
        return $model;
      }
    }
    return null;
  }
}