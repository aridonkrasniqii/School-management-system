<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<?php
include "./repositories/homework-result-repository.php";
include "./models/homework-result.php";
include "./models/subject.php";
include "./repositories/subject-repository.php";

$student_id = $_SESSION['user_id'];


$subject_repo = new subject_repository;
$subject_array = $subject_repo->getAll();
$homework_repo = new homework_result_repository;
$homework_results = $homework_repo->getStudentResults($student_id);

?>



<center>
  <form action="" method="post">
    <select name="subject">
      <?php foreach ($subject_array as $s) { ?>
      <option value="<?php echo $s->getId(); ?>"><?php echo $s->getName(); ?></option>
      <?php } ?>
    </select>
    <select name="semester">
      <option value="1">Semester 1</option>
      <option value="2">Semester 2</option>
      <option value="3">Semester 3 </option>
    </select>
    <button type="submit" name="filter-assessments">Filter</button>
  </form>

  <br><br>
  <table class="assessments styled-table">
    <tr>
      <th>Homework Result ID</th>
      <th>Student Name</th>
      <th>Homework Name</th>
      <th>Homework Points</th>
      <th>Delivered on time</th>
      <th>Homework Date</th>
      <th>Subject</th>
      <th>Semester</th>
    </tr>
    <?php

    foreach ($homework_results as $result) {
    ?>
    <tr>
      <td><?php echo $result->getId(); ?></td>
      <td><?php echo getStudentName($result->getStudent_id()); ?></td>
      <td><?php echo getHomeworkName($result->getHomework()); ?></td>
      <td><?php echo $result->getPoints(); ?></td>
      <td><?php echo $result->getDelivered_on_time(); ?></td>
      <td><?php echo $result->getResult_date(); ?></td>
      <td><?php echo $homework_repo->findSubject($result->getHomework()); ?></td>
      <td><?php echo $homework_repo->getSemester($result->getHomework()); ?></td>
    </tr>
    <?php
    } ?>
  </table>
</center>
<style>
.assessments {
  color: black;
  border: 1px solid black;
}

.assessments td,
.assessments th {
  width: 120px;
  padding: 5px 5px;
  font-size: 13px;
}

.styled-table {
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