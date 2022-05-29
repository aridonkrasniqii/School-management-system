<?php
require("./database/connection.php");
$connection = db::getConnection();
//check get request
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $query = "SET FOREIGN_KEY_CHECKS=0;";
  mysqli_query($connection, $query);

  $query2 = "DELETE FROM subject WHERE id = $id;";


  mysqli_query($connection, $query2);

  $query3 = "SET FOREIGN_KEY_CHECKS=1;";
  mysqli_query($connection, $query3);



  header('Location: ../teacher_dashboard.php');
}