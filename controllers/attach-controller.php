<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



if (isset($_POST['attach_homework'])) {
  include("../models/attached.php");
  require("../database/dbconnect.php");
  include("../repositories/attached-homework-repository.php");
  session_start();
  $subject_id = $_POST['subject'];
  $semester = $_POST['semester'];
  $homework_id = $_POST['homework'];
  $student_id = $_SESSION['user_id'];
  $description = $_POST['description'];
  $filename = $_POST['filename'];


  if (empty($subject_id) || empty($semester) || empty($homework_id) || empty($student_id) || empty($description)) {
    header("location: ../views/uploaded-file.php?error=emptyfields");
    exit();
  }



  $file = $_FILES['file'];
  $fileName = $_FILES['file']['name'];
  $fileSize = $_FILE['file']['size'];
  $tmpFileName = $_FILES['file']['tmp_name'];
  $fileError = $_FILES['file']['error'];
  $fileExctension = explode(".", $fileName);
  $finalExc = strtolower(end($fileExctension));

  $allowedFiles = array("pdf");

  if (!in_array($finalExc, $allowedFiles)) {
    header("Location: ../views/uploaded-file.php?error=notsupported");
    exit();
  }
  if ($fileError != 0) {
    header("Location: ../views/uploaded-file.php?error=fileerror");
    exit();
  }
  if ($fileSize > 200000) {
    header("Location: ../views/uploaded-file.php?error=bigfilesize");
    exit();
  }
  $uniqueName = $filename . "." . $finalExc;

  $fileDestination = "../uploads/" . $uniqueName;

  if (!move_uploaded_file($tmpFileName, $fileDestination)) {
    header("Location: ../views/uploaded-file.php?error=uploaderror");
    exit();
  }
  $model = new attached(1, $homework_id, $subject_id, $student_id, 0, $description, $uniqueName);
  $repository = new attached_repository();
  if ($repository->create($model) == null) {
    header("location: ../views/uploaded-file.php?error=failedtoattachhomework");
    exit();
  } else {
    header("Location: ../views/uploaded-file.php?error=success");
    exit();
  }
} else {
  header("Location: ../student_dashboard.php");
  exit();
}