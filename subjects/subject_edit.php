<?php
require("../database/connection.php");
$connection = db::getConnection();


if(isset($_POST['edit'])){
    $id = mysqli_real_escape_string($connection , $_POST['id']);
    $name = mysqli_real_escape_string($connection ,$_POST['name']);
    $credits = mysqli_real_escape_string($connection ,$_POST['credits']);
    $lctured_by = mysqli_real_escape_string($connection ,$_POST['lectured_by']);
    $semester = mysqli_real_escape_string($connection ,$_POST['semester']);

}


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