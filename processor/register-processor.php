<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require("../database/connection.php");
require("../repositories/student-repository.php");
require("../repositories/teacher_repository.php");
class register_processor
{

  function registerUser($index, $fullname, $role, $username, $email, $password, $passwordRepeat)
  {

    if (empty($index) || empty($fullname) || empty($role) || empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
      header("Location: ../views/" . $role . "-signup-views.php?error=emptyfield");
      exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../views/" . $role . "-signup-view.php?error=invalidemail");
      exit();
    } elseif (!preg_match('/^[a-zA-Z0-9]/', $password)) {
      header("Location: ../views/" . $role . "-signup-view.php?error=invaliduid&mailTEDT=" . $email . "=password=" . $password);
      exit();
    } elseif ($password != $passwordRepeat) {
      header("Location: ../views/" . $role . "-signup-view.php?error=passworddoesnotmatch");
      exit();
    } elseif ($role != "teacher" || $role != "assistant") {
      header("Location: ../signup.php?error=");
      exit();
    }


    if ($role == "teacher") {
      $teacher_repository = new teacher_repository;
      if ($teacher_repository->teacherExists($username, $email)) {
        header("Location: ../views/teacher-signup-view.php?error=userexists");
        exit();
      }

      $hashpwd = password_hash($password, PASSWORD_DEFAULT);
      $model = new teacher(1, $fullname, $role, $username, $email, $hashpwd, $index);
      if ($teacher_repository->create($model) == null) {
        header("Location: ../views/teacher-signup-view.php?error=sqlerror");
        exit();
      }
      header("Location: ../views/teacher-signup-view.php?error=success");
      exit();
    }

    if ($role == "student") {
      $student_repository = new student_repository;
      if ($student_repository->studentExists($username, $email)) {
        header("Location: ../views/student-signup-view.php?error=userexists");
        exit();
      }
      $hashpwd = password_hash($password, PASSWORD_DEFAULT);
      $model = new student(0, $fullname, $username, $email, $hashpwd, $index);
      if ($student_repository->create($model) == null) {
        header("Location: ../views/student-signup-view.php?error=sqlerror");
        exit();
      }
      header("Location: ../views/student-signup-view.php?error=success");
      exit();
    }
  }
}