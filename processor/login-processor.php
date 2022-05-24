<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



function loginProcessor($user, $pwd, $role)
{

  require("../database/db.php");

  if (empty($user) || empty($pwd)) {
    header("Location: ../" . $role . "_login.php?error=emptyfields  ");
    exit();
  } else {

    $query = "select * from " . $role . " where " . $role . "_username = ? or " . $role . "_email = ?";

    $stmt = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
      header("Location: ../" . $role . "_login.php?error=sql&error");
      exit();
    } else {

      mysqli_stmt_bind_param($stmt, "ss", $user, $user);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if ($row = mysqli_fetch_assoc($result)) {
        $pwdCheck = password_verify($pwd, $row[$role . "_password"]);

        if ($pwdCheck == false) {
          header("Location: ../" . $role . "_login.php?error=wrongpwd");
          exit();
        } elseif ($pwdCheck == true) {
          echo "test password true";
          // A session is a way to store information (in variables) to be used across multiple pages. Unlike a cookie, the information is not stored on the users computer.
          session_start();
          $_SESSION['user_id'] = $row[$role . "_id"];
          $_SESSION['user_index'] = $row[$role . "_index"];
          $_SESSION['user_username'] = $row[$role . "_username"];
          $_SESSION['user_name'] = $row[$role . "_fullname"];
          $_SESSION['user_email'] = $row[$role . "_email"];

          header("Location: ../" . $role . "_dashboard.php?login=success");
          exit();
        }
      } else {
        header("Location: ../" . $role . "_login.php?login=invalidusername");
        exit();
      }
    }
  }
}