<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"aca");

    //check get request
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "DELETE FROM student WHERE student_id = $id;";

        mysqli_query($connection, $query);

        header('Location: ../teacher_dashboard.php');
    }

?>