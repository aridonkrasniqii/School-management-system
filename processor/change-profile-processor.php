<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['save-updates'])) {
  include "../repositories/student-repository.php";
  include "../models/student.php";
  session_start();

  $id = $_SESSION['user_id'];
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $repeat_password = $_POST['repeat_password'];
  $role = "student";
  $salt = "11231231";
  $index = $_POST['index'];


  if (empty($name) || empty($username) || empty($email) || empty($password) || empty($repeat_password) || empty($role) || empty($salt)) {
    header("Location: ../views/profile-view.php?error=error");
    exit();
  }

  if ($password != $repeat_password) {
    header("Location: ../views/profile-view.php?error=error");
    exit();
  }
  $repository = new student_repository();

  // check if user exists
  if ($repository->userExists($username)) {
    header("Location: ../views/profile-view.php?error=usernametaken");
    exit();
  }

  // check if index is used
  if ($repository->indexExists($index)) {
    header("Location: ../views/profile-view.php?error=indextaken");
    exit();
  }


  $stu = new student($id, $name, $role, $username, $email, $password, $salt, $index);

  if ($repository->update($stu) != null) {
    header("Location: ../views/profile-view.php?error=success");
    exit();
  } else {
    header("Location: ../views/profile-view.php?error=error");
    exit();
  }
} else {
  header("Location: ../views/profile-view.php");
  exit();
}