<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (isset($_POST['submit-email'])) {

  $name = $_POST['name'];
  $subject = $_POST['subject'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $mailTo = $_POST['professor-mail'];


  // TODO: do the validation



  $headers = "From: " . $mail;
  $txt = "An email form :  " . $name . ".\n\n" . $message;

  if (mail($mailTo, $subject, $txt, $headers)) {
    header("Location: ../views/about-view.php?mail=sent");
  } else {
    header("Location: ../views/about-view.php?mail=notsent");
  }
  exit();
} else {
  $role = $_SESSION['user_role'];
  header("Location: ../" . $role . "dashboard.php");
  exit();
}