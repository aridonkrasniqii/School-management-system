<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require("../database/connection.php");
require("../processor/login-processor.php");

if (isset($_POST['login-student'])) {
  $usr = mysqli_real_escape_string(db::getConnection(), $_POST['username']);
  $pwd = mysqli_real_escape_string(db::getConnection(), $_POST['password']);

  $login_processor = new login_processor;
  $login_processor->login($usr, $pwd, "student", db::getConnection());
} elseif (isset($_POST['login-teacher'])) {


  $login_processor = new login_processor;
  $usr = mysqli_real_escape_string(db::getConnection(), $_POST['username']);
  $pwd = mysqli_real_escape_string(db::getConnection(), $_POST['password']);

  $login_processor->login($usr, $pwd, "teacher", db::getConnection());
} else {
  header("Location: ../signup.php?error=kerka&sje");
  exit();
}