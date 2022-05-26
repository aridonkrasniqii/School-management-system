<?php
include("./controllers/subject_controller.php");
include("./controllers/attached-controller.php");



$student_id = $_SESSION['user_id'];

$attached_controller = new attached_controller;
$attached_homeworks = $attached_controller->getStudentHomeworks($student_id);

$subject_controller = new subject_controller;
$array = $subject_controller->findAllSubjects();



?>

<center>


  <form action="" method="post">
    <select name="filter-subject" id="">
      <?php foreach ($array as $a) { ?>
      <option value="<?php echo $a->getId(); ?>"><?php echo $a->getName(); ?></option>
      <?php } ?>
    </select>

    <select name="filter-semester" id="">
      <option value="1" name="semester">Semester 1 </option>
      <option value="2" name="semester">Semester 2</option>
      <option value="3" name="semester">Semester 3 </option>
    </select>
    <button type="submit" name="submitmyname">submit</button>

  </form>

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
      <td><?php echo $attached_controller->findHomework($h->getHomework_id()); ?></td>
      <td><?php echo $attached_controller->findSubject($h->getSubject_id()); ?></td>
      <td><?php echo $attached_controller->findStudent($h->getStudent_id()); ?></td>
      <td><?php echo $h->getAttached_date(); ?></td>
      <td><?php echo $h->getDescription(); ?></td>
      <td><?php echo $attached_controller->findSemester($h->getHomework_id()); ?></td>
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