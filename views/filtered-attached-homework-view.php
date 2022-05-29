<?php
require("./database/connection.php");
include("./models/attached.php");
include("./repositories/attached-homework-repository.php");

$repository = new attached_repository();
$student_id = $_SESSION['user_id'];
$attached_homeworks = $repository->getFilteredData($student_id, $subject_id, $semester_id);



?>

<center>


  <table class="styled-table" style="width:300px;">
    <tr>
      <th>Homework</th>
      <th>Subject</th>
      <th>Student</th>
      <th>Attached Date</th>
      <th>Description</th>
      <th>Semester</th>
      <th>FileName</th>
    </tr>
    <?php foreach ($attached_homeworks as $h) { ?>
    <tr>
      <td><?php echo $repository->findHomework($h->getHomework_id()); ?></td>
      <td><?php echo $repository->findSubject($h->getSubject_id()); ?></td>
      <td><?php echo $repository->findStudent($h->getStudent_id()); ?></td>
      <td><?php echo $h->getAttached_date(); ?></td>
      <td><?php echo $h->getDescription(); ?></td>
      <td><?php echo $repository->findSemester($h->getHomework_id()); ?></td>
      <td><a href="./uploads/files.php?filename=<?php echo $h->getFilename(); ?>">Check uploaded file ...</a></td>
    </tr>

    <?php } ?>

  </table>
</center>

<style>
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