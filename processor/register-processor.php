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
      header("Location: ../views/" . $role . "-signup-views.php?error=emptyfield");
      exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../views/" . $role . "-signup-view.php?error=invalidemail");
      // we send back the username becase it is supposed to be correct
      exit();
    } elseif (!preg_match('/^[a-zA-Z0-9]/', $password)) {
      header("Location: ../views/" . $role . "-signup-view.php?error=invaliduid&mailTEDT=" . $email . "=password=" . $password);
      // we send back the email
      exit();
    } elseif ($password != $passwordRepeat) {
      header("Location: ../views/" . $role . "-signup-view.php?error=passworddoesnotmatch");
      exit();
    }
    // if the user try to create a username that already exists
    $sql = "SELECT " . $role . "_username FROM " . $role . " WHERE " . $role . "_username = ?";
    // sql statment
    $stmt = mysqli_stmt_init($connection);
    // always check for errors in php code
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../views/" . $role . "-signup-view.php?error=sqlerror");
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
        header("Location: ../views/" . $role . "-signup-view.php?error=usernametaken");
        exit();
      } else {
        // insted of selecting we are gonna insert into the database
        if ($role == "teacher") {
          $sql = "insert into teacher(teacher_name,teacher_role, teacher_username, teacher_email, teacher_password, teacher_index)
          values(? , ? , ? , ? , ? ,?);";
          $stmt = mysqli_stmt_init($connection);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../views/" . $role . "-signup-view.php?error=sqlerror");
            exit();
          } else {

            // hash the password
            $hashpwd = password_hash($password, PASSWORD_DEFAULT);


            mysqli_stmt_bind_param($stmt, "ssssss", $fullname, $role, $username, $email, $hashpwd, $index);
            mysqli_stmt_execute($stmt);
            header("Location: ../views/" . $role . "-signup-view.php?error=success");
            exit();
          }
        }


        if ($role == "student") {
          $sql = "insert into student(student_name, student_username, student_email, student_password, student_index)
          values(? , ? , ? , ? , ?);";


          $stmt = mysqli_stmt_init($connection);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../views/" . $role . "-signup-view.php?error=sqlerror");
            exit();
          } else {

            // hash the password
            $hashpwd = password_hash($password, PASSWORD_DEFAULT);


            mysqli_stmt_bind_param($stmt, "sssss", $fullname, $username, $email, $hashpwd, $index);
            mysqli_stmt_execute($stmt);
            header("Location: ../views/" . $role . "-signup-view.php?error=success");
            exit();
          }
        }
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
  }
}