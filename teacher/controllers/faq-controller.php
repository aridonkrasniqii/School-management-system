<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require("../../database/connection.php");



if (isset($_POST['submit-answer'])) {
  require("../../repositories/faq-repository.php");
  $faq_id = $_POST['faq-id'];
  $faq_answer = $_POST['faq-answer'];
  $repository = new faq_repository();
  $repository->updateAnswer($faq_id, $faq_answer);


  header("Location: ../../teacher_dashboard.php?error=success");
  exit();
} elseif (isset($_POST['submit-faq'])) {
  require("../../repositories/faq-repository.php");
  $question = $_POST['faq_question'];
  $answer = null;
  $repository = new faq_repository();
  $repository->create($question, $answer);
  header("Location: ../../teacher_dashboard.php?error=success");
} else {
  header("Location: ../../teacher_dashboard.php");
  exit();
}
