<?php
	$connection = mysqli_connect("localhost:3307","root","");
	$db = mysqli_select_db($connection,"aca");
    $id = $_POST['id'];
	$title = $_POST['title'];
    $credits = $_POST['credits'];
    $type =$_POST['type'];
    $lectured_by = $_POST['lectured_by'];
    //validimi...

    //create sql
    $query = "UPDATE subject
    SET 
    subject_title = '$title',
    subject_credits = $credits,
    subject_type = '$type',
    subject_lectured_by = $lectured_by
    WHERE
    subject_id = $id;";
    mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Subject edited successfully.");
	window.location.href = "../teacher_dashboard.php";
</script>