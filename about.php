<?php
session_start();
// load some teachers
require("./models/teacher.php");
require("./database/connection.php");
require("./repositories/teacher_repository.php");
$teacher_repository = new teacher_repository;

$teachers = $teacher_repository->aboutTeachers();


$file1 = "";
$file2 = "";
$file3 = "";





?>


<div>
  <?php
  $userRole = $_SESSION['user_role'];
  $i = 0;
  if ($userRole == "student") { ?>
  <button><a href="student_dashboard.php">Go Back To Home Page</a></button>
  <?php } else if ($userRole == "teacher") { ?>

  <button> <a href="teacher_dashboard.php">Go Back To Home Page</a></button>
  <?php } ?>
</div>


<?php
// here you need to read some file content



?>
<div class="about-section">
  <h1>About Us Page</h1>
  <p>Some text about who we are and what we do.</p>
  <p>Resize the browser window to see that this page is responsive by the way.</p>
</div>




<h2 style="text-align:center">Our Professors</h2>
<div class="row">

  <?php foreach ($teachers as $t) { ?>
  <div class="column">
    <div class="card">
      <img src="<?php echo "./images/person" . $i . ".jpeg"; ?>" alt="Jane" style="width:100%">
      <div class="container">
        <h2> <?php echo $t->getTeacher_name(); ?></h2>
        <p class="title"><?php echo $t->getTeacher_role(); ?></p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p><?php echo $t->getTeacher_email(); ?></p>
        <p><button class="button" type="submit">Contact</button></p>
      </div>
    </div>
  </div>
  <?php $i++;
  } ?>



</div>


<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*,
*:before,
*:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after,
.row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>