<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class student_repository
{

  public function find($id)
  {
    $query = "select * from student where student_id = ?;";

    $connection = mysqli_connect("localhost", "root", "", "school");

    $stmt = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {

      mysqli_stmt_bind_param($stmt, "i", $id);
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);

      if ($row = mysqli_fetch_assoc($result)) {
        return new student($row['student_id'], $row['student_name'], $row['student_role'], $row['student_username'], $row['student_email'], $row['student_password'], $row['student_salt'], $row['student_index']);
      }
    }
  }

  public function update($student)
  {

    $query = "update student set student_name = ? , student_role = ? , student_username = ? ,student_email = ? , student_password = ? , student_salt = ? , student_index = ? where student_id = ?";
    $connection = mysqli_connect("localhost", "root", "", "school");
    $stmt = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      throw new Exception();
    } else {
      $name = $student->getStudent_name();
      $role = "student";
      $email = $student->getStudent_email();
      $username = $student->getStudent_username();
      $password = $student->getStudent_password();

      // compute hash
      $hashpwd = password_hash($password, PASSWORD_DEFAULT);
      $salt = $student->getStudent_salt();
      $studentid = $student->getStudent_index();
      $id = $student->getStudent_id();
      mysqli_stmt_bind_param($stmt, "sssssssi", $name, $role, $username, $email, $hashpwd, $salt, $studentid, $id);

      mysqli_stmt_execute($stmt);

      if (mysqli_stmt_affected_rows($stmt) != 1) {
        return null;
      }
      return $this->find($student->getStudent_id());
    }
  }


  public function userExists($username)
  {
    $connection = mysqli_connect("localhost", "root", "", "school");
    $stmt = mysqli_stmt_init($connection);
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
    $connection = mysqli_connect("localhost", "root", "", "school");
    $stmt = mysqli_stmt_init($connection);
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
}