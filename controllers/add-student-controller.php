<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require("../database/connection.php");
require("../models/student.php");
require("../repositories/student-repository.php");

if (isset($_POST[''])) {
  $name = $_POST['name']; //me evitu malicious sql actions
  $username = $_POST['username'];
  $email = $_POST['email'];
  $index = $_POST['index'];
  $password = password_hash($index, PASSWORD_DEFAULT);

  $model = new student(1, $name, $username, $email, $password, $index);

  $repository = new student_repository();

  if ($repository->create($model)) {
    header("Location: ../teacher_dashboard.php?error=addedstudent");
    exit();
  } else {
    header("Location: ../teacher_dashboard.php?error=error");
    exit();
  }
} else {
  header("Location: ../teacher_dashboard.php");
  exit();
}