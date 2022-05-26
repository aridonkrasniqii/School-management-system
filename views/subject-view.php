<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("./controllers/subject_controller.php");
$controller = new subject_controller;
$subjects = $controller->findAllSubjects();
?>


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

    <table border="1" class="subject-table styled-table">

      <tr>
        <th>
          Subject Name
        </th>
        <th>Subject Credits</th>
        <th>Teacher</th>
        <th>Semester</th>
        <th>More info</th>
      </tr>
      <?php foreach ($subjects as $s) { ?>
      <tr>
        <td><?php echo $s->getName(); ?></td>
        <td><?php echo $s->getCredits(); ?></td>
        <td><?php echo $controller->findTeacher($s->getCreated_by()); ?></td>
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

</html>