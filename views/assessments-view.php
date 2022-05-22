<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<table class="assessments">
  <tr>
    <th>Homework Result ID</th>
    <th>Student Name</th>
    <th>Homework Name</th>
    <th>Homework Points</th>
    <th>Delivered on time</th>
    <th>Homework Date</th>
  </tr>
  <?php
  include "./repositories/homework-result-repository.php";
  include "./models/homework-result.php";
  $homework_results = getAll();
  foreach ($homework_results as $result) {
  ?>
  <tr>
    <td><?php echo $result->getId(); ?></td>
    <td><?php echo getStudentName($result->getStudent_id()); ?></td>
    <td><?php echo getHomeworkName($result->getHomework()); ?></td>
    <td><?php echo $result->getPoints(); ?></td>
    <td><?php echo $result->getDelivered_on_time(); ?></td>
    <td><?php echo $result->getResult_date(); ?></td>
  </tr>
  <?php
  } ?>
</table>
<style>
.assessments {
  color: black;
  border: 1px solid black;
}

.assessments td,
.assessments th {
  width: 120px;
  padding: 5px 15px;
  font-size: 20px;
}
</style>
