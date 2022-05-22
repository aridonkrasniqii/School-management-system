<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"aca");
    $title = $_POST['title'];//me evitu malicious sql actions
    $credits = $_POST['credits'];
    $lectured_by = $_POST['lectured_by'];
    //validimi...

    //create sql
    $query = "INSERT INTO subject(subject_title, subject_credits, subject_lectured_by)
    VALUES('$title', $credits, '$type', $lectured_by);";
    $query_run = mysqli_query($connection,$query);

?>
<script type="text/javascript">
alert("Subject added successfully.");
window.location.href = "../teacher_dashboard.php";
</script>