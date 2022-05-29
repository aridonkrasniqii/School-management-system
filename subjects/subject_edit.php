<?php
$connection = mysqli_connect("localhost:3307", "root", "");
$db = mysqli_select_db($connection, "school");
$id = $_POST['id'];
$name = $_POST['name'];
$credits = $_POST['credits'];
$lectured_by = $_POST['lectured_by'];
$semester = $_POST['semester'];
//validimi...

//create sql
$query = "UPDATE subject
    SET
    name = '$name',
    credits = $credits,
    semester = $semester
    WHERE
    id = $id;";
mysqli_query($connection, $query);

$query2 = "UPDATE subject_lectured_by
    SET
    teacher_id = $lectured_by
    WHERE
    subject_id = $id;";
mysqli_query($connection, $query2);




?>
<script type="text/javascript">
alert("Subject edited successfully.");
window.location.href = "../teacher_dashboard.php";
</script>