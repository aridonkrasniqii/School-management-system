<?php
	$connection = mysqli_connect("localhost:3307","root","");
	$db = mysqli_select_db($connection,"aca");
	$title = $_POST['title'];//me evitu malicious sql actions
    $credits = $_POST['credits'];
    $type =$_POST['type'];
    $lectured_by = $_POST['lectured_by'];
    //validimi...

    //create sql
    $query = "INSERT INTO subject(subject_title, subject_credits, subject_type, subject_lectured_by)
    VALUES('$title', $credits, '$type', $lectured_by);";
    $query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Subject added successfully.");
	window.location.href = "../teacher_dashboard.php";
</script>