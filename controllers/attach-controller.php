<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();


if (isset($_POST['attach_homework'])) {
  $subject_id = $_POST['subject'];
  $semester = $_POST['semester'];
  $homework_id = $_POST['homework'];
  $student_id = $_SESSION['user_id'];
  $description = $_POST['description'];

  $file = $_FILES['file'];
  $fileName = $_FILES['file']['name'];
  $tmpFileName = $_FILES['file']['tmp_name'];
  $fileError = $_FILES['file']['error'];
  $fileExctension = explode(".", $fileName);
  $finalExc = strtolower(end($fileExctension));
  echo "ext :" . $finalExc;

  $allowedFiles = array("jpg", "jpeg", "png", "pdf");

  if (!in_array($finalExc, $allowedFiles)) {
    // header("Location: ../views/uploaded-file.php?error=notsupported");
    exit();
  }
  if ($fileError != 0) {
    header("Location: ../views/uploaded-file.php?error=fileerror");
    exit();
  }
  $storedFileName = $fileName . "." . $finalExc;
  $fileDestination = "../uploads/" . $storedFileName;

  if (!move_uploaded_file($tmpFileName, $fileDestination)) {
    header("Location: ../views/uploaded-file.php?error=uploaderror");
    exit();
  } else {
    header("Location: ../views/uploaded-file.php?error=success");
    exit();
  }
} else {
  // header("Location: ../student_dashboard.php");
  // exit();
}