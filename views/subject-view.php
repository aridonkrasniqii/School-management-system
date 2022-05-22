<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/student.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <title>Document</title>

</head>

<body>
  <center>
    <h4>Student Subjects</h4>

    <table border="1" class="subject-table">
      <?php
      $subjects = findAllSubject();
      ?>
      <tr>
        <!-- name -->
        <th>
          Subject Name
        </th>
        <!-- credits -->
        <th>Subject Credits</th>
        <!-- created by -->
        <th>Teacher</th>
        <!-- semester -->
        <th>Semester</th>
        <!-- subject of id -->
        <th>More info</th>

      </tr>
      <?php foreach ($subjects as $s) { ?>
      <tr>
        <td><?php echo $s->getName(); ?></td>
        <td><?php echo $s->getCredits(); ?></td>
        <td><?php echo findTeacher($s->getCreated_by()); ?></td>
        <td><?php echo $s->getSemester(); ?></td>
        <td><a href="views/more-subject-view.php?id=<?php echo $s->getId(); ?>">More ...</a></td>
      </tr>
      <?php } ?>
    </table>
  </center>
</body>

<style>
.subject-table {
  border-collapse: collapse;

}

.subject-table th,
.subject-table td {
  height: 30px;
  padding: 10px;

}
</style>

</html>