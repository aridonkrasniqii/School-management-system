<?php





if (isset($_POST['add-subject'])) {
  $name = $_POST['name'];
  $credits = $_POST['credits'];
  $created_by = $_SESSION['user_id'];
  $lectured_by = $_POST['lectured_by'];
  $semester = $_POST['semester'];

  $date = date("Y-m-d");

  $model = new subject(1, $name, $creadits, $date, $semester, $create_by);

  
} else {
  header("Location: ../teacher_dashboard.php");
  exit();
}