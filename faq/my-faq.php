<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (isset($_POST['submit-faq'])) {
    $question = $_POST['faq_question'];
    $answer = null;

    $query = "insert into faq(faq_question , faq_answer) values( ? , ? )";
    $connection = mysqli_connect("localhost", "root", "", "aca");
    $stmt = mysqli_stmt_init($connection);

    if(!mysqli_stmt_prepare($stmt, $query)){
      throw new Exception();
    }else {
      mysqli_stmt_bind_param($stmt , "ss" , $question ,$answer);
      mysqli_stmt_execute($stmt);
      header("Location: ../student_dashboard.php");
      exit();
    }
}else {
    header("Location: ../student_dashboard.php");
    exit();
}


