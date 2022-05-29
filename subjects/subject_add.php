<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require("../database/connection.php");
$connection = db::getConnection();
session_start();
$name = $_POST['name'];
$credits = $_POST['credits'];
$created_by = $_SESSION['user_id'];
$lectured_by = $_POST['lectured_by'];
$semester = $_POST['semester'];
//validimi...

//create sql
$query1 = "INSERT INTO subject(name, credits, created_by, semester)
    VALUES('$name', $credits, $created_by, $semester);";
mysqli_query($connection, $query1);

$query2 = "SELECT id FROM subject
                WHERE name = '$name';";
$query_run = mysqli_query($connection, $query2);
if ($row = mysqli_fetch_assoc($query_run)) {
  $subject_id = $row['id'];
}


$query3 = "INSERT INTO subject_lectured_by(subject_id, teacher_id)
    VALUES($subject_id, $lectured_by);";
mysqli_query($connection, $query3);

?>
<script type="text/javascript">
alert("Subject added successfully.");
window.location.href = "../teacher_dashboard.php";
</script>