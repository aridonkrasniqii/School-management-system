<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['student-register'])) {

  require("../database/db.php");

  $index = $_POST['index'];
  $fullname = $_POST['fullname'];
  $role = $_POST['role'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $passwordRepeat = $_POST['pwd-repeat'];

  if(empty($index) || empty($fullname) || empty($role) || empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
    header("Location: ../signup/student_signup.php?error=emptyfield");
    exit();
  }
  // elseif(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match($password, '/^[a-zA-Z0-9]*$/', $username) ) {
  //   // header("Location: ../signup.php?error=invalidmailuid");
  //   exit();
  // }

  elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      header("Location: ../signup/student_signup.php?error=invalidemail");
      // we send back the username becase it is supposed to be correct
      exit();
  }
  elseif(!preg_match('/^[a-zA-Z0-9]/', $password)){
        header("Location: ../signup/student_signup.php?error=invaliduid&mailTEDT=".$email . "=password=".$password);
        // we send back the email
        exit();
  }
  elseif($password != $passwordRepeat){
      header("Location: ../signup/student_signup.php?error=passworddoesnotmatch");
      exit();
  }
  // if the user try to create a username that already exists
   $sql = "SELECT student_username FROM student WHERE student_username = ?";
    // sql statment
    $stmt = mysqli_stmt_init($connection);
    // always check for errors in php code
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup/student_signup.php?error=sqlerror");
        exit();
    }else {
          // if ss $username, $password
          mysqli_stmt_bind_param($stmt, "s", $username); // insert a string into the steatment
          mysqli_stmt_execute($stmt);
          // it will run this information inside the database
          // if we get a match at database it means that there is a user with that username
          mysqli_stmt_store_result($stmt);
          $resultCheck = mysqli_stmt_num_rows($stmt); // number of users in database

          if($resultCheck > 0) {
            // return user to the signed up page with error message
            header("Location: ../signup/student_signup.php?error=usernametaken");
            exit();

          }else {
            // insted of selecting we are gonna insert into the database
            $sql = "INSERT INTO student(student_name,student_role, student_username,student_email,student_password,student_salt,student_index) values(?,?,?,?,?,?,?);";
            $stmt = mysqli_stmt_init($connection);
            if(!mysqli_stmt_prepare($stmt, $sql)){
              header("Location: ../signup/student_signup.php?error=sqlerror");
              exit();
            }else {

              // hash the password
              $hashpwd = password_hash($password, PASSWORD_DEFAULT);
              // fix me compute hash
              $salt = "12345678";

              mysqli_stmt_bind_param($stmt, "sssssss", $fullname, $role, $username, $email,$hashpwd,$salt, $index);
              mysqli_stmt_execute($stmt);
              header("Location: ../signup/student_signup.php?error=success");
              exit();
            }
          }
        }// IT IS GOOD TO CLOSE THE DATABASE IF WE WANT THE WEBSITE TO NOW RUN  RESOURCES
        mysqli_stmt_close($stmt);
        mysqli_close($connection);

}
elseif(isset($_POST['teacher-register'])) {

  require("../database/db.php");

  $index = $_POST['index'];
  $fullname = $_POST['fullname'];
  $role = $_POST['role'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $passwordRepeat = $_POST['pwd-repeat'];

  if(empty($index) || empty($fullname) || empty($role) || empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
    header("Location: ../signup/teacher_signup.php?error=emptyfield");
    exit();
  }
  // elseif(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match($password, '/^[a-zA-Z0-9]*$/', $username) ) {
  //   // header("Location: ../signup.php?error=invalidmailuid");
  //   exit();
  // }

  elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      header("Location: ../signup/teacher_signup.php?error=invalidemail&uid=".$username);
      // we send back the username becase it is supposed to be correct
      exit();
  }
  elseif(!preg_match('/^[a-zA-Z0-9]/', $password)){
        header("Location: ../signup/teacher_signup.php?error=invaliduid&mailTEDT=".$email . "=password=".$password);
        // we send back the email
        exit();
  }
  elseif($password != $passwordRepeat){
      header("Location: ../signup/teacher_signup.php?error=password&check&uid".$username , "&mail".$email);
      exit();
  }
  // if the user try to create a username that already exists
   $sql = "SELECT teacher_username FROM teacher WHERE teacher_username = ? OR teacher_email = ?";
    // sql statment
    $stmt = mysqli_stmt_init($connection);
    // always check for errors in php code
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup/teacher_signup.php?error=sqlerror");
        exit();
    }else {
          // if ss $username, $password
          mysqli_stmt_bind_param($stmt, "ss", $username, $email); // insert a string into the steatment
          mysqli_stmt_execute($stmt);
          // it will run this information inside the database
          // if we get a match at database it means that there is a user with that username
          mysqli_stmt_store_result($stmt);
          $resultCheck = mysqli_stmt_num_rows($stmt); // number of users in database

          if($resultCheck > 1) {
            // return user to the signed up page with error message
            header("Location: ../signup/teacher_signup.php?erro=usertaken&mail=".$email);
            exit();

          }else {
            // insted of selecting we are gonna insert into the database
            $sql = "INSERT INTO teacher(teacher_name,teacher_role, teacher_username,teacher_email,teacher_password,teacher_salt,teacher_index) values(?,?,?,?,?,?,?);";
            $stmt = mysqli_stmt_init($connection);
            if(!mysqli_stmt_prepare($stmt, $sql)){
              header("Location: ../signup/teacher_signup.php?error=sqlerror");
              exit();
            }else {

              // hash the password
              $hashpwd = password_hash($password, PASSWORD_DEFAULT);
              // fix me compute hash
              $salt = "12345678";

              mysqli_stmt_bind_param($stmt, "sssssss", $fullname, $role, $username, $email,$hashpwd,$salt, $index);
              mysqli_stmt_execute($stmt);
              header("Location: ../signup/teacher_signup.php?error=success");
              exit();
            }
          }
        }// IT IS GOOD TO CLOSE THE DATABASE IF WE WANT THE WEBSITE TO NOW RUN  RESOURCES
        mysqli_stmt_close($stmt);
        mysqli_close($connection);


}else{
  header("Location: ../signup.php?");
  exit();
}




