<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (isset($_POST['add-subject'])) {
  require("../models/subject.php");
  require("../database/connection.php");
  require("../repositories/subject-repository.php");
  $name = $_POST['name'];
  $credits = $_POST['credits'];
  $created_by = $_SESSION['user_id'];
  $lectured_by = $_POST['lectured_by'];
  $semester = $_POST['semester'];

  if(!preg_match('/[0-9]/',$credits)) {
    header("Location: ../teacher_dashboard.php?error=invalidcredits");
    exit();
  }
  if(!preg_match('/[0-9]/',$lectured_by)) {
    header("Location: ../teacher_dashboard.php?error=invalidteacherid");
    exit();
  }
  if(!preg_match('/[0-9]/',$semester)) {
    header("Location: ../teacher_dashboard.php?error=invalidsemester");
    exit();
  }

  $date = date("Y-m-d");

  $model = new subject(1, $name, $credits, $date, $semester, $created_by);

  $repository = new subject_repository;
  if ($repository->create($model)) {
    header("Location: ../teacher_dashboard.php?error=subjectadded");
    exit();
  } else {
    header("Location: ../teacher_dashboard.php?error=subjectnotadded");
  }
} else {
  header("Location: ../teacher_dashboard.php");
  exit();
}
