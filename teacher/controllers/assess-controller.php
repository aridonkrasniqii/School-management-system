<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("../../models/student.php");
require("../../models/homework.php");
require("../../models/homework-result.php");
require("../../repositories/homework-result-repository.php");
require("../../repositories/student-repository.php");
require("../../repositories/homework-repository.php");
$student_repo = new student_repository;
$homework_repo = new homework_repository;



if (isset($_POST['submit-assess'])) {
  $studentId = $_POST['studentId'];
  $homeworkId = $_POST['homeworkId'];
  $subjectId = $_POST['subjectId'];
  $attached = $_POST['attached'];

  $homeworkArra = $homework_repo->find($homeworkId);
  $studentArr = $student_repo->find($studentId);
?>

<body>


  <div class="container">

    <form action="./assess-controller.php" method="post">
      <table class="styled-table">
        <tr>
          <td>Homework:</td>
          <td> <?php echo $homeworkArra->getName(); ?></td>
        </tr>
        <tr>
          <td>Student: </td>
          <td> <?php echo $studentArr->getStudent_name(); ?></td>
        </tr>

        <tr>
          <td>
            Points:
          </td>
          <td> <input type="text" name="points" placeholder="Points of homework"></td>
        </tr>

        <tr>
          <td>Delivered on time:</td>
          <td> <?php
                  // put homework_id and attached_date instead
                  $delivered_on_time = findDeliveredOnTime($homeworkId, $attached);
                  if ($delivered_on_time) {
                    $delivered_on_time = "yes";
                    echo "Yes!";
                  } else {
                    $delivered_on_time = "no";
                    echo "No!";
                  }
                  ?></td>
        </tr>
        <tr>
          <td> <button type="submit" id="b" name="reg-result">Submit Assess</button>
          </td>
        </tr>
      </table>
      <input type="hidden" name="studentId" value="<?php echo $studentId; ?>">
      <input type="hidden" name="homeworkId" value="<?php echo $homeworkId; ?>">
      <input type="hidden" name="subjectId" value="<?php echo $subjectId; ?>">
      <input type="hidden" name="time" value="<?php echo $delivered_on_time; ?>">
    </form>

  </div>


</body>

<?php
} elseif (isset($_POST['reg-result'])) {
  $studentId = $_POST['studentId'];
  $homeworkId = $_POST['homeworkId'];
  $subjectId = $_POST['subjectId'];
  $points = $_POST['points'];
  $delivered_on_time = $_POST['time'];
  $model = new homework_result(1, $homeworkId, $studentId, $points, $delivered_on_time, 'now()');
  $homework_result_repo = create($model);

  if ($homework_result_repo != null) {
    header("Location: assess-controller.php?error=success");
    exit();
  } else {
    header("Location: assess-controller.php?error=error");
    exit();
  }
} else {
  if (isset($_GET['error'])) {
    if ($_GET['error'] == 'success') {
      echo "<p style = 'color:green;''>Result registered success fully </p>";
  ?>
<button id="bb"><a href="../../teacher_dashboard.php">Go Back</a></button>

<?php
    } else {
      echo "<p style = 'color:red;''>Error </p>";
    }
    ?>
<button id="bb"><a href="../../teacher_dashboard.php">Go Back</a></button>

<?php
  }
}
?>

<style>
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

#bb {
  margin: 10px;
  padding: 10px;
  font-size: 20px;
}

body {
  background-color: lightcyan;
}

.container {
  font-size: 25px;
  width: 80%;
  margin: 0 auto;
  display: flex;
  justify-content: center;
  align-items: center;
}

.container label {
  font-weight: bold;
  border: 1px solid black;
  padding: 4px 10px;
  margin-left: 10px;
}

.container input {
  height: 25px;
  width: 250px;
  margin-left: 20px;
  font-size: 20px;

}

.second-container {}

.lbl {
  margin: 20px;
}

#b {
  margin-left: 40px;
  font-size: 25px;
  cursor: pointer;
  ;
}
</style>