<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class register_processor
{

  function registerUser($index, $fullname, $role, $username, $email, $password, $passwordRepeat)
  {



    require("../database/db.php");

    if (empty($index) || empty($fullname) || empty($role) || empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
      header("Location: ../signup/" . $role . "_signup.php?error=emptyfield");
      exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../signup/" . $role . "_signup.php?error=invalidemail");
      // we send back the username becase it is supposed to be correct
      exit();
    } elseif (!preg_match('/^[a-zA-Z0-9]/', $password)) {
      header("Location: ../signup/" . $role . "_signup.php?error=invaliduid&mailTEDT=" . $email . "=password=" . $password);
      // we send back the email
      exit();
    } elseif ($password != $passwordRepeat) {
      header("Location: ../signup/" . $role . "_signup.php?error=passworddoesnotmatch");
      exit();
    }
    // if the user try to create a username that already exists
    $sql = "SELECT " . $role . "_username FROM " . $role . " WHERE " . $role . "_username = ?";
    // sql statment
    $stmt = mysqli_stmt_init($connection);
    // always check for errors in php code
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../signup/" . $role . "_signup.php?error=sqlerror");
      exit();
    } else {
      // if ss $username, $password
      mysqli_stmt_bind_param($stmt, "s", $username); // insert a string into the steatment
      mysqli_stmt_execute($stmt);
      // it will run this information inside the database
      // if we get a match at database it means that there is a user with that username
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt); // number of users in database

      if ($resultCheck > 0) {
        // return user to the signed up page with error message
        header("Location: ../signup/" . $role . "_signup.php?error=usernametaken");
        exit();
      } else {
        // insted of selecting we are gonna insert into the database
        $sql = "INSERT INTO " . $role . "(" . $role . "_name," . $role . "_role, " . $role . "_username," . $role . "_email," . $role . "_password," . $role . "_salt," . $role . "_index) values(?,?,?,?,?,?,?);";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../signup/" . $role . "_signup.php?error=sqlerror");
          exit();
        } else {

          // hash the password
          $hashpwd = password_hash($password, PASSWORD_DEFAULT);
          // fix me compute hash
          $salt = "12345678";

          mysqli_stmt_bind_param($stmt, "sssssss", $fullname, $role, $username, $email, $hashpwd, $salt, $index);
          mysqli_stmt_execute($stmt);
          header("Location: ../signup/" . $role . "_signup.php?error=success");
          exit();
        }
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
  }
}