<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);




if (isset($_POST['homework_filter'])) {


  $subject = $_POST['subject'];
  $semester = $_POST['semester'];

  include("../repositories/homework-repository.php");
  include("../models/homework.php");

  $repository = new homework_repository();
  $homeworks = $repository->filterHomeworks($semester, $subject);
} else {
  header("Location: ../student_dashboard.php");
  exit();
}