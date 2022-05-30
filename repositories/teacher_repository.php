<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class teacher_repository
{


  private $connection;
  public function __construct()
  {
    $this->connection = db::getConnection();
  }

  public function aboutTeachers()
  {
    $query = "select * from teacher order by teacher_id desc limit 4 ";
    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      $teachers = array();
      while ($row = mysqli_fetch_assoc($result)) {
        $teachers[] = $this->fromFetchAssoc($row);
      }
      if ($teachers != null)
        return $teachers;
      else
        throw new Exception;
    }
    return null;
  }

  public function fromFetchAssoc($row)
  {
    return new teacher($row['teacher_id'], $row['teacher_name'], $row['teacher_role'], $row['teacher_username'], $row['teacher_email'], $row['teacher_password'], $row['teacher_index']);
  }

  public function find($teacher_id)
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
        $teacher = $this->fromFetchAssoc($row);
      }
      return $teacher;
    }
    return null;
  }
  public function create($model)
  {
    $query = "insert into teacher(teacher_name, teacher_role, teacher_username, teacher_email,teacher_password, teacher_index) values(?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($this->connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      $fullname = $model->getTeacher_name();
      $username = $model->getTeacher_username();
      $email = $model->getTeacher_email();
      $password = $model->getTeacher_password();
      $index = $model->getTeacher_index();
      $role = $model->getTeacher_role();
      mysqli_stmt_bind_param($stmt, "ssssss", $fullname, $role, $username, $email, $password, $index);
      return mysqli_stmt_execute($stmt);
    }
  }

  public function teacherExists($username, $email)
  {
    $sql = "select * from teacher where teacher_username = ? or teacher_email = ?";
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