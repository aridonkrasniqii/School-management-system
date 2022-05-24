<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (isset($_POST['submit-faq'])) {
  require("../repositories/faq-repository.php");
  $question = $_POST['faq_question'];
  $answer = null;
  $repository = new faq_repository();
  $repository->create($question, $answer);
} else {
  header("Location: ../student_dashboard.php");
  exit();
}