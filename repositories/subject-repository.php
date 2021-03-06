<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class subject_repository
{

  private $connection;

  public function __construct()
  {
    $this->connection = db::getConnection();
  }

  function getAll()
  {
    $query = "select * from subject";

    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      $subjects = array();

      while ($row = mysqli_fetch_assoc($result)) {
        $subjects[] = $this->fromFetchAssoc($row);
      }
      return $subjects;
    }
    return null;
  }

  function fromFetchAssoc($row)
  {
    $id = $row['id'];
    $name = $row['name'];
    $credits = $row['credits'];
    $created_at  = $row['created_at'];
    $created_by = $row['created_by'];
    $semester = $row['semester'];
    return new subject($id, $name, $credits, $created_at, $semester, $created_by);
  }

  public function findSpecificTeacher($teacher_id)
  {
    $query = "select * from teacher where teacher_id = ?";
    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_bind_param($stmt, "i", $teacher_id);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if ($row = mysqli_fetch_assoc($result)) {
        return $row['teacher_name'];
      }
      return null;
    }
  }


  public function create($model)
  {
    $query = "insert into subject(name,credits, created_at, created_by , semester)values(?,?,?,?, ?)";
    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {

      $name  = $model->getName();
      $credits = $model->getCredits();
      $created_at  = $model->getCreated_at();
      $semester  = $model->getSemester();
      $create_by = $model->getCreated_by();

      mysqli_stmt_bind_param($stmt, "ssssi", $name, $credits, $created_at, $create_by, $semester);

      return mysqli_stmt_execute($stmt);
    }
  }
}