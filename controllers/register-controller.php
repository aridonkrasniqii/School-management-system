<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (isset($_POST['student-register'])) {
  $index =  $_POST['index'];
  $fullname =  $_POST['fullname'];
  $role = "student";
  $username =  $_POST['username'];
  $email =  $_POST['email'];
  $password =  $_POST['password'];
  $passwordRepeat = $_POST['pwd-repeat'];

  include("../processor/register-processor.php");

  $processor = new register_processor();

  $processor->registerUser($index, $fullname, $role, $username, $email, $password, $passwordRepeat);
} elseif (isset($_POST['teacher-register'])) {

  $index =  $_POST['index'];
  $fullname =  $_POST['fullname'];
  $role = $_POST['role'];
  $username =  $_POST['username'];
  $email =  $_POST['email'];
  $password =  $_POST['password'];
  $passwordRepeat = $_POST['pwd-repeat'];

  include("../processor/register-processor.php");

  $processor = new register_processor();

  $processor->registerUser($index, $fullname, $role, $username, $email, $password, $passwordRepeat);
} else {
  header("Location: ../signup.php?");
  exit();
}