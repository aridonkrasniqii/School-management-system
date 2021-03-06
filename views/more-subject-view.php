<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php

  if (isset($_GET['id'])) {
    include("../models/homework.php");
    include("../repositories/homework-repository.php");
    require("../database/connection.php");

    $subject_id = $_GET['id'];
    $repository = new homework_repository();
    $array = $repository->showSubjectHomework($subject_id);
  }
  ?>
  <center>
    <table border=1 class="styled-table">
      <tr>
        <th>Homework Name</th>
        <th>Subject Id</th>
        <th>Description</th>
        <th>Max Points</th>
        <th>Created At</th>
        <th>Deadline</th>
        <th>Teacher</th>
        <th>Semester</th>
        <th>More info ..</th>
      </tr>
      <?php foreach ($array as $h) { ?>
      <tr>
        <td><?php echo $h->getName(); ?></td>
        <td><?php echo $repository->findSpecificSubject($h->getSubject()); ?></td>
        <td><?php echo $h->getDescription(); ?></td>
        <td><?php echo $h->getMax_points(); ?></td>
        <td><?php echo $h->getCreated_at(); ?></td>
        <td><?php echo $h->getDeadline() ?></td>
        <td><?php echo $repository->findSpecificTeacher($h->getCreated_by()); ?></td>
        <td><?php echo $h->getSemester(); ?></td>
        <td><a href="my-homework.php?id=<?php echo $h->getId(); ?>">More info ...</a></td>
      </tr>
      <?php } ?>
    </table>

  </center>


  <center style="margin:80px">

    <button style="width:150px;height:30px;font-size:20px;"><a href=" ../student_dashboard.php">Go Back</a></button>

  </center>


</body>
<style>
table {
  border-collapse: collapse;
}

td,
th {
  height: 30px;
  padding: 10px;
}


.styled-table {
  margin-top: 200px;
  width: 100%;
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  font-family: sans-serif;
  min-width: 400px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
  max-width: 600px;
  white-space: nowrap;
}

.styled-table thead tr {
  background-color: #009879;
  color: #ffffff;
  text-align: left;
}

.styled-table th,
.styled-table td {
  padding: 12px 30px;
}

.styled-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.styled-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}
</style>

</html>