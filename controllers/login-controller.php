<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['login-student'])) {
  // require("../database/db.php");
  require("../database/connection.php");
  require("../processor/login-processor.php");

  $usr = mysqli_real_escape_string(db::getConnection(), $_POST['username']);
  $pwd = mysqli_real_escape_string(db::getConnection(), $_POST['password']);

  loginProcessor($usr, $pwd, "student");
} elseif (isset($_POST['login-teacher'])) {

  // require("../database/db.php");
  require("../database/connection.php");
  require("../processor/login-processor.php");

  $usr = mysqli_real_escape_string(db::getConnection(), $_POST['username']);
  $pwd = mysqli_real_escape_string(db::getConnection(), $_POST['password']);

  loginProcessor($usr, $pwd, "teacher");
} else {
  header("Location: ../signup.php?error=kerka&sje");
  exit();
}