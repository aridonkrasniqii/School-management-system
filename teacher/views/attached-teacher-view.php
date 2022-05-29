<?php

require("./database/connection.php");
include("./models/attached.php");
include("./repositories/attached-homework-repository.php");

$repository = new attached_repository();

$attached_homeworks = $repository->getAll();

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
      <th>Assess Homework</th>
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


      <form action="./teacher/controllers/assess-controller.php" method="post">
        <input type="hidden" name="studentId" value="<?php echo $h->getStudent_id(); ?>">
        <input type="hidden" name="homeworkId" value="<?php echo $h->getHomework_id(); ?>">
        <input type="hidden" name="subjectId" value="<?php echo $h->getSubject_id(); ?>">
        <input type="hidden" name="attached" value="<?php echo $h->getAttached_date(); ?>">
        <td><button type="submit" name="submit-assess" id="a">Assess</button></td>
      </form>
    </tr>
    <?php } ?>

  </table>
</center>

<style>
#a {
  text-decoration: underline;
}

.styled-table {
  width: 90%;
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
  padding: 7px 20px;
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