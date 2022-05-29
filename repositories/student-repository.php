<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class student_repository
{


  private $connection;

  public function __construct()
  {
    $this->connection = db::getConnection();
  }

  public function find($id)
  {
    $query = "select * from student where student_id = ?;";

    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {

      mysqli_stmt_bind_param($stmt, "i", $id);
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);

      if ($row = mysqli_fetch_assoc($result)) {
        return new student($row['student_id'], $row['student_name'], $row['student_username'], $row['student_email'], $row['student_password'], $row['student_index']);
      }
    }
  }

  public function update($student)
  {

    $query = "update student set student_name = ? , student_username = ? ,student_email = ? , student_password = ?  , student_index = ? where student_id = ?";
    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      $name = $student->getStudent_name();
      $email = $student->getStudent_email();
      $username = $student->getStudent_username();
      $password = $student->getStudent_password();

      // compute hash
      $hashpwd = password_hash($password, PASSWORD_DEFAULT);

      $studentid = $student->getStudent_index();
      $id = $student->getStudent_id();

      mysqli_stmt_bind_param($stmt, "sssssi", $name, $username, $email, $hashpwd, $studentid, $id);

      mysqli_stmt_execute($stmt);

      if (mysqli_stmt_affected_rows($stmt) != 1) {
        return null;
      }
      return $this->find($student->getStudent_id());
    }
  }

  public function create($model)
  {
    $query = "insert into student(student_name, student_username, student_email, student_password, student_index)
          values(? , ? , ? , ? , ?);";
    $stmt = mysqli_stmt_init($this->connection);
    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      $fullname = $model->getStudent_name();
      $username = $model->getStudent_username();
      $email = $model->getStudent_email();
      $password = $model->getStudent_password();
      $index = $model->getStudent_index();
      mysqli_stmt_bind_param($stmt, "sssss", $fullname, $username, $email, $password, $index);
      mysqli_stmt_execute($stmt);
      return $this->find($model->getStudent_id());
    }
    return null;
  }

  public function userExists($username)
  {
    $stmt = mysqli_stmt_init($this->connection);
    $query = "select student_username from student where student_username = ?";

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        return true;
      }
    }

    return false;
  }
  public function indexExists($index)
  {
    $stmt = mysqli_stmt_init($this->connection);
    $query = "select student_index from student where student_index = ?";

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_bind_param($stmt, "i", $index);
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        return true;
      }
    }
    return false;
  }
  public function studentExists($username, $email)
  {
    $sql = "select * from student where student_username = ? or student_email = ?";
    $stmt = mysqli_stmt_init($this->connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      throw new Exception();
    } else {
      mysqli_stmt_bind_param($stmt, "ss", $username, $email);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if ($resultCheck > 0) {
        return true;
      }
      return false;
    }
  }
}