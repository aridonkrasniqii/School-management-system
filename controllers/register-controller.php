<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



if (isset($_POST['student-register'])) {

  require("../database/connection.php");
  $connection = db::getConnection();
  $index = mysqli_real_escape_string($connection, $_POST['index']);
  $fullname = mysqli_real_escape_string($connection, $_POST['fullname']);
  $role = "student";
  $username = mysqli_real_escape_string($connection, $_POST['username']);
  $email = mysqli_real_escape_string($connection, $_POST['email']);
  $password = mysqli_real_escape_string($connection, $_POST['password']);
  $passwordRepeat = mysqli_real_escape_string($connection, $_POST['pwd-repeat']);

  include("../processor/register-processor.php");
  $processor = new register_processor();

  $processor->registerUser($index, $fullname, $role, $username, $email, $password, $passwordRepeat);
} elseif (isset($_POST['teacher-register'])) {

  require("../database/connection.php");
  $connection = db::getConnection();
  $index = mysqli_real_escape_string($connection, $_POST['index']);
  $fullname = mysqli_real_escape_string($connection, $_POST['fullname']);
  $role = "teacher";
  $username = mysqli_real_escape_string($connection, $_POST['username']);
  $email = mysqli_real_escape_string($connection, $_POST['email']);
  $password = mysqli_real_escape_string($connection, $_POST['password']);
  $passwordRepeat = mysqli_real_escape_string($connection, $_POST['pwd-repeat']);
  include("../processor/register-processor.php");

  $processor = new register_processor();

  $processor->registerUser($index, $fullname, $role, $username, $email, $password, $passwordRepeat);
} else {
  header("Location: ../signup.php?");
  exit();
}