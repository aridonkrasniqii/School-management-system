<?php
	$connection = mysqli_connect("localhost:3307","root","");
	$db = mysqli_select_db($connection,"school");

    //check get request
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
      
        $query = "SET FOREIGN_KEY_CHECKS=0;";
        mysqli_query($connection, $query);
      
        $query2 = "DELETE FROM student WHERE student_id = $id;";
      
      
        mysqli_query($connection, $query2);
      
        $query3 = "SET FOREIGN_KEY_CHECKS=1;";
        mysqli_query($connection, $query3);

      
      
        header('Location: ../teacher_dashboard.php');
      }




?>