<?php
session_start();
require("../models/teacher.php");
require("../database/connection.php");
require("../repositories/teacher_repository.php");
include("../files/readfile.php");

$teacher_repository = new teacher_repository;

$teachers = $teacher_repository->aboutTeachers();



?>


<div class="btn-container">
  <?php
  $userRole = $_SESSION['user_role'];
  $i = 0;
  if ($userRole == "student") { ?>
  <button><a href="../student_dashboard.php" id="bobackbtn">Go Back To Home Page</a></button>
  <?php } else if ($userRole == "teacher") { ?>

  <button> <a href="../teacher_dashboard.php" id="bobackbtn">Go Back To Home Page</a></button>
  <?php } ?>
</div>

<div class="about-section">
  <?php
  if (isset($_GET['mail'])) {
    if ($_GET['mail'] == 'sent') {
      echo "<p style = 'color:green;'>Email was sent</p>";
    } elseif ($_GET['mail'] == 'notsent') {
      echo "<p style = 'color:red;'>Email was not sent</p>";
    }elseif($_GET['yourmail'] == 'invalid'){
      echo "<p style = 'color:red;'>Your email you typed is invalid</p>";
    }
    elseif($_GET['teachermail'] == 'invalid'){
      echo "<p style = 'color:red;'>Your teacher's email you typed is invalid</p>";
    }
  
  }
  ?>
  <h1>About Us Page</h1>
  <p><?php echo $aboutContent[0]; ?></p>
  <p><?php echo $aboutContent[1]; ?></p>
</div>




<h2 style="text-align:center">Our Professors</h2>
<div class="row">

  <?php foreach ($teachers as $t) { ?>
  <div class="column">
    <div class="card">
      <img src="<?php echo "../images/person" . $i . ".jpeg"; ?>" alt="Professor" style="width:100%">
      <div class="container">
        <h2> <?php echo $t->getTeacher_name(); ?></h2>
        <p class="title"><?php echo strtoupper($t->getTeacher_role()); ?></p>
        <p>
          <?php echo $fileContent[$i]; ?>
        </p>
        <p><?php echo $t->getTeacher_email(); ?></p>
        <form action="contact-view.php" method="post">
          <button class="button" type="submit" name="submit-contact">Contact</button>
          <input type="hidden" name="teacher-id" value="<?php echo $t->getTeacher_id(); ?>">
        </form>
      </div>
    </div>
  </div>
  <?php $i++;
  } ?>



</div>
<div style="padding:20px; background-color:#474e5d; color:white;font-weight:bold;">
  <?php
  if (isset($_SESSION['visitCount'])) {
    $_SESSION['visitCount']++;
    echo "Congrats! You have visited our website " . $_SESSION['visitCount'] . " times!";
  } else {
    $_SESSION['visitCount'] = 1;
    echo "This is the first time you are visiting our website";
  }
  ?>
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


#bobackbtn {
  color: black;
  text-decoration: underline;
  font-weight: bold;
  font-size: 20px;
  padding: 5px;
}

.btn-container {
  padding: 10px;
  background-color: #474e5d;
}
</style>
