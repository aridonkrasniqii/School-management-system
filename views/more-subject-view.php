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
    require("../database/dbconnect.php");
    $subject_id = $_GET['id'];
    $repository = new homework_repository();
    $array = $repository->showSubjectHomework($subject_id);
  }
  ?>
  <center>
    <table border=1>
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
</style>

</html>