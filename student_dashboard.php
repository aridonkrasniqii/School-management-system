<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_username'])) {
  header("Location: ./student_login.php");
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>STUDENT DASHBOARD</title>

  <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./css/student.css">
  <link rel="stylsheet" type="text/css" href="./css/student_dashboard.css">
  <script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>

</head>

<body>
  <div id="header" class="student-header">
    <br>
    <div>
      <strong>
        <center>STUDENT MANAGEMENT AND ACADEMIC SYSYTEM</center>
        <center>
      </strong>E-mail:<?php echo $_SESSION['user_email']; ?> &nbsp; &nbsp; &nbsp;
      Name:<?php echo $_SESSION['user_username']; ?>&nbsp; &nbsp;</center>
    </div>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="./views/profile-view.php">Profile</a></li>
      <li><a href="logout.php">Logout</a></li>
      <li><a href="./views/about-view.php">About</a></li>
    </ul>
    <br>
  </div>
  <div id="left_side">
    <form action="" method="post">
      <center>
        <table>
          <tr>
            <td>
              <input type="submit" name="subjects" value="SUBJECTS" id="btn"><br><br>
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="assigments" value="TO DO" id="btn"><br><br>
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="assessments" value="ASSESSMENTS" id="btn"><br><br>
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="attachments" value="ATTACHED HOMEWORK" id="btn"><br><br>
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="attach" value="ATTACH HOMEWORK" id="btn"><br><br>
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="livesearch" value="Events" id="btn"><br><br>
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="faq" value="FAQ" id="btn"><br><br>
            </td>
          </tr>
        </table>
      </center>
    </form>
  </div>
  <div id="right_side"><br><br>
    <div id="demo">



      <?php
      if (isset($_POST['subjects'])) {
        include("./views/subject-view.php");
      }
      ?>

      <?php
      if (isset($_POST['assigments'])) {
        include("./views/todo-view.php");
      }
      ?>


      <?php if (isset($_POST['attachments'])) {
        include("./views/attached-homework-view.php");
      }
      ?>


      <?php
      if (isset($_POST['assessments'])) {
        include("./views/assessments-view.php");
      }
      ?>

      <?php if (isset($_POST['submitmyname'])) {
        $semester_id = $_POST['filter-semester'];
        $subject_id = $_POST['filter-subject'];
        include("./views/filtered-attached-homework-view.php");
      }
      ?>

      <?php
      if (isset($_POST['filter-assessments'])) {
        $subject_id = $_POST['subject'];
        $semester = $_POST['semester'];
        include("./views/filtered-assessments-view.php");
      }
      ?>

      <?php
      if (isset($_POST['attach'])) {
        include("./views/attach-homework-view.php");
      }
      ?>

      <?php
      if (isset($_POST['faq'])) {
        include("./views/faq-view.php");
      }
      ?>

      <?php
      if (isset($_POST['livesearch'])) {
        require("./ajax/search-form.php");
      }
      ?>
    </div>
  </div>
</body>


<div style="padding:10px;background-color: white; color:black;">
  <form action="" method="POST">
    <label>Web Mode Select</label><br><br>
    <input type="radio" id="html" name="mode" value="#dfe6e9">
    <label for="html">Light</label><br>
    <input type="radio" id="css" name="mode" value="black">
    <label for="css">Dark</label><br>
    <input type="submit" name="submit_mode">
  </form>


  <div class="dark-mode">
    <?php
    if (isset($_POST['submit_mode'])) {
      $mode = $_POST['mode'];
      setcookie('background', $mode, time() + 86400, '/');
    }
    if (isset($_COOKIE["background"])) {
      $background = $_COOKIE["background"];
    }
    ?>
  </div>


</div>







<style>
body {
  font-family: 'Arial';
  background-color: <?php echo $background;
  ?>;
}

#header {
  height: 8%;
  width: 99%;
  top: 2%;
  background-color: #b2bec3;
  border: solid 2px black;
  border-radius: 10px;
  color: black;
}

#header:hover {
  -webkit-box-shadow: -2px 7px 21px -9px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: -2px 7px 21px -9px rgba(0, 0, 0, 0.75);
  box-shadow: -2px 7px 21px -9px rgba(0, 0, 0, 0.75);
}

#left_side {
  padding-top: 10px;
  background-color: #b2bec3;
  width: 15%;
  top: 25%;
  position: fixed;
  overflow: scroll;
  border: solid 2px black;
  border-radius: 10px;
  padding-bottom: 10px;
  padding-right: 10px;
}

#left_side:hover {
  -webkit-box-shadow: -2px 7px 21px -9px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: -2px 7px 21px -9px rgba(0, 0, 0, 0.75);
  box-shadow: -2px 7px 21px -9px rgba(0, 0, 0, 0.75);
}

#right_side {
  height: auto;
  width: 80%;
  background-color: #b2bec3;
  position: absolute;
  left: 17%;
  top: 21%;
  color: black;
  border: solid 2px black;
  border-radius: 10px;
  padding-bottom: 20px;
}

a {
  text-decoration: none;
}

#right_side:hover {
  -webkit-box-shadow: -2px 7px 21px -9px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: -2px 7px 21px -9px rgba(0, 0, 0, 0.75);
  box-shadow: -2px 7px 21px -9px rgba(0, 0, 0, 0.75);
}

#top_span {
  top: 15%;
  width: 80%;
  left: 17%;
  position: fixed;
}

#btn {
  border-radius: 5px;
  background-color: #dfe6e9;
  width: 170px;
}

#btn:hover {
  -webkit-box-shadow: -2px 7px 21px -9px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: -2px 7px 21px -9px rgba(0, 0, 0, 0.75);
  box-shadow: -2px 7px 21px -9px rgba(0, 0, 0, 0.75);
}

#td {
  border: 1px solid black;
  padding-left: 2px;
  text-align: left;
  width: 210px;
}

#btn1 {
  border-radius: 5px;
  background-color: #dfe6e9;
}

@media screen and (max-width: 550px) {
  #btn {
    width: 50px;
    font-size: 4px;
  }

  #btn1 {
    font-size: 8px;
  }

  #left_side {
    width: 12%;
    padding-top: 30px;
  }

  #right_side {
    font-size: 8px;
  }
}

#right_side #demo {
  padding: 0 20px;
}

.search_filter .subject-homework,
.search_filter .semester-homework {
  width: 100px;
  padding: 5px;
  background: white;
  border-radius: 3px;
  cursor: pointer;
  transition: 0.3s ease-in-out;
  border: 1px solid transparent;
  outline: none;
}
</style>

</html>