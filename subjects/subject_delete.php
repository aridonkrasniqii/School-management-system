<?php
	$connection = mysqli_connect("localhost:3307","root","");
	$db = mysqli_select_db($connection,"aca");

    //check get request
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "DELETE FROM subject WHERE subject_id = $id;";

        mysqli_query($connection, $query);

        header('Location: ../teacher_dashboard.php');
    }

?>
