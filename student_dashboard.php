<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_reset();
session_start();
if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_username'])) {
  header("Location: ./student_login.php");
  exit();
}

require "./database/dbconnect.php";
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

  <script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
  body {
    font-family: 'Arial';
    background-color: #dfe6e9;
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
    width: 150px
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
    width: 200px;
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
      font-size: 8px
    }

    #left_side {
      width: 12%;
      padding-top: 30px;
    }

    #right_side {
      font-size: 8px
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
  <?php
  $connection = mysqli_connect("localhost", "root", "");
  $db = mysqli_select_db($connection, "aca");
  ?>
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
      <li><a href="./profile/profile.php">Profile</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
    <br>
  </div>
  <span id="top_span">
    <marquee>if there is any problem plz contact to management group</marquee>
  </span>
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
              <input type="submit" name="my_homework" value="MY HOMEWORK" id="btn"><br><br>
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="assessments" value="ASSESSMENTS" id="btn"><br><br>
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="attach" value="ATTACH HOMEWORK" id="btn"><br><br>
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="faq" value="FAQ" id="btn"><br><br>
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="search_student" value="SEARCH STUDENT" id="btn"><br><br>
            </td>
          </tr>
          <tr>
            <td><br>
              <input type="submit" name="search_teacher" value="SEARCH TEACHER" id="btn"><br><br>
            </td>
          </tr>
          <tr>
            <td><br>
              <input type="submit" name="search_result" value="SEARCH RESULT" id="btn"><br><br>
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
        include("./models/subject.php");
        include("./repositories/subject-repository.php");
        include("./controllers/subject_controller.php");
        include("./views/subject-view.php");

      ?>


      <?php
      }
      ?>
      <?php
      if (isset($_POST['my_homework'])) {
      ?>
      <?php
        include "./repositories/subject-repository.php";
        include "./models/subject.php";
        $s = new subject_repository();
        $sub = $s->getAll(); ?>
      <form action="" class="search_filter" method="post">
        <div class="container">
          <select name="subject" class="subject-homework">
            <?php foreach ($sub as $s) { ?>
            <option value="<?php echo strtolower($s->getId()); ?>">
              <?php echo $s->getName(); ?>
            </option>
            <?php } ?>
          </select>

          <select name="semester" class="semester-homework">
            <?php ?>
            <option value="semester-1">Semester 1</option>
            <option value="semester-2">Semester 2</option>
            <option value="semester-3">Semester 3</option>

            <?php ?>
          </select>
          <button type="submit" name="homework_filter">Filter</button>
        </div>
      </form>

      <?php //TODO: filters
        ?>

      <div class="box__section">
        <div class="container">
          <div class="box__wrapper">
            <?php

              if (!isset($_POST['homework_filter'])) {
                include "./repositories/homework-repository.php";
                include "./models/homework.php";
                $h1 = new homework_repository();
                $homeworks = $h1->getAll();
                foreach ($homeworks as $homework) { ?>
            <div class="box">
              <div class="box__wrapper--ins">
                <div class="box__assigment">

                  <span>Assigment Due <?php echo $homework->getDeadline(); ?></span>
                </div>
                <div class="box__info">
                  <div class="box__number">
                    <!-- ID OF HOMEWORK -->
                    <span><?php echo "ID: " . $homework->getId(); ?></span>
                  </div>
                  <div class="box__title">
                    <h4><a href="./my-homework/my-homework.php?id=<?php echo $homework->getId(); ?>"><?php
                    echo $homework->getName();
                    ?></a></h4>
                  </div>
                </div>
              </div>
            </div>

            <?php
                } ?>

          </div>
        </div>
      </div>

      <?php
              }
            } else {

              // LOAD FILTERED DATA

              // TODO:
              // $subject = $_POST['subject'];
              // $semester = $_POST['semester'];

              // include "./repositories/homework-repository.php";
              // include "./models/homework.php";

              // $repository = new homework_repository();
              // $homeworks = $repository->filterHomeworks($semester, $subject);

              // print_r($homeworks);
            }
    ?>
      <?php
    if (isset($_POST['assessments'])) {
      include("./views/assessments-view.php");
    }
     ?>


      <?php
    if (isset($_POST['attach'])) {
      include("./views/attachement-view.php");
    }
    ?>

      <?php
    if (isset($_POST['faq'])) {
      include("./views/faq-view.php");
    }
    ?>
      <!--
      <?php

    if (isset($_POST['search_student'])) {
    ?>
      <center>
        <form action="" method="post">
          &nbsp;&nbsp;<b>Enter Roll No:</b>&nbsp;&nbsp; <input type="text" name="roll_no">
          <input type="submit" name="search_by_roll_no_for_search" value="Search">
        </form><br><br>

      </center>
      <?php
    }
    if (isset($_POST['search_by_roll_no_for_search'])) {
      $query = "select * from students where roll_no = '$_POST[roll_no]'";
      $query_run = mysqli_query($connection, $query);
      while ($row = mysqli_fetch_assoc($query_run)) {
      ?>
      <center>
        <h4><b><u>Student's details</u></b></h4><br><br>
        <table>
          <tr>
            <td>
              <b>Roll No: &nbsp; &nbsp;&nbsp;</b>
            </td>
            <td>
              <input type="text" id="btn1" value="<?php echo $row['roll_no'] ?>" disabled>
            </td>
          </tr>
          <tr>
            <td>
              <b>Name: &nbsp; &nbsp;&nbsp;</b>
            </td>
            <td>
              <input type="text" id="btn1" value="<?php echo $row['name'] ?>" disabled>
            </td>
          </tr>
          <tr>
            <td>
              <b>Father's Name: &nbsp; &nbsp;&nbsp;</b>
            </td>
            <td>
              <input type="text" id="btn1" value="<?php echo $row['father_name'] ?>" disabled>
            </td>
          </tr>
          <tr>
            <td>
              <b>Class: &nbsp; &nbsp;&nbsp;</b>
            </td>
            <td>
              <input type="text" id="btn1" value="<?php echo $row['class'] ?>" disabled>
            </td>
          </tr>
          <tr>
            <td>
              <b>Mobile: &nbsp; &nbsp;&nbsp;</b>
            </td>
            <td>
              <input type="text" id="btn1" value="<?php echo $row['mobile'] ?>" disabled>
            </td>
          </tr>
          <tr>
            <td>
              <b>Email: &nbsp; &nbsp;&nbsp;</b>
            </td>
            <td>
              <input type="text" id="btn1" value="<?php echo $row['email'] ?>" disabled>
            </td>
          </tr>
          <tr>
            <td>
              <b>Password: &nbsp; &nbsp;&nbsp;</b>
            </td>
            <td>
              <input type="password" id="btn1" value="<?php echo $row['password'] ?>" disabled>
            </td>
          </tr>
          <tr>
            <td>
              <b>Remark:&nbsp; &nbsp;&nbsp;</b>
            </td>
            <td>
              <textarea rows="3" cols="40" id="btn1" disabled><?php echo $row['remark'] ?></textarea>
            </td>
          </tr>
        </table>
      </center>
      <?php
      }
    }
    ?>
      <?php
    if (isset($_POST['search_teacher'])) {
    ?>
      <center>
        <form action="" method="post">
          &nbsp;&nbsp;<b>Enter Teacher's name:</b>&nbsp;&nbsp; <input type="text" name="teacher_name">
          <input type="submit" name="search_by_roll_no_for_search_teacher" value="Search">
        </form><br><br>

      </center>
      <?php
    }
    if (isset($_POST['search_by_roll_no_for_search_teacher'])) {
      $query = "select * from teachers where teacher_name = '$_POST[teacher_name]'";
      $query_run = mysqli_query($connection, $query);
      while ($row = mysqli_fetch_assoc($query_run)) {
      ?>

      <center>
        <h4><b><u>Teacher's details</u></b></h4><br><br>
        <table>
          <tr>
            <td>
              <b>Name: &nbsp; &nbsp;&nbsp;</b>
            </td>
            <td>
              <input type="text" id="btn1" value="<?php echo $row['teacher_name'] ?>" disabled>
            </td>
          </tr>
          <tr>
            <td>
              <b>Class Teacher: &nbsp; &nbsp;&nbsp;</b>
            </td>
            <td>
              <input type="text" id="btn1" value="<?php echo $row['class_teacher'] ?>" disabled>
            </td>
          </tr>
          <tr>
            <td>
              <b>Subject: &nbsp; &nbsp;&nbsp;</b>
            </td>
            <td>
              <input type="text" id="btn1" value="<?php echo $row['teacher_subject'] ?>" disabled>
            </td>
          </tr>
          <tr>
            <td>
              <b>Mobile: &nbsp; &nbsp;&nbsp;</b>
            </td>
            <td>
              <input type="text" id="btn1" value="<?php echo $row['mobile_no'] ?>" disabled>
            </td>
          </tr>
          <tr>
            <td>
              <b>Email: &nbsp; &nbsp;&nbsp;</b>
            </td>
            <td>
              <input type="text" id="btn1" value="<?php echo $row['email'] ?>" disabled>
            </td>
          </tr>
          <tr>
            <td>
              <b>Password: &nbsp; &nbsp;&nbsp;</b>
            </td>
            <td>
              <input type="password" id="btn1" value="<?php echo $row['password'] ?>" disabled>
            </td>
          </tr>
          <tr>
            <td>
              <b>Gender: &nbsp; &nbsp;&nbsp;</b>
            </td>
            <td>
              <input type="text" id="btn1" value="<?php echo $row['gender'] ?>" disabled>
            </td>
          </tr>
        </table>
      </center>
      <?php
      }
    }
    ?>
      <?php
    if (isset($_POST['search_result'])) {
    ?>
      <center>
        <form action="" method="post">
          &nbsp;&nbsp;<b>Enter Roll No:</b>&nbsp;&nbsp; <input type="text" name="roll_no">
          <input type="submit" name="search_by_roll_no_for_result_search" value="Search">
        </form><br><br>

      </center>
      <?php
    }
    if (isset($_POST['search_by_roll_no_for_result_search'])) {
      $query = "select * from results where roll_no = '$_POST[roll_no]'";
      $query_run = mysqli_query($connection, $query);
      while ($row = mysqli_fetch_assoc($query_run)) {
      ?>
      <center>
        <h4><b><u>Student's result</u></b></h4><br><br>
        <table>
          <tr>
            <td>
              <b>Roll No: &nbsp; &nbsp;&nbsp;</b>
            </td>
            <td>
              <input type="text" id="btn1" value="<?php echo $row['roll_no'] ?>" disabled>
            </td>
          </tr>
          <tr>
            <td>
              <b>Name: &nbsp; &nbsp;&nbsp;</b>
            </td>
            <td>
              <input type="text" id="btn1" value="<?php echo $row['name'] ?>" disabled>
            </td>
          </tr>
          <tr>
            <td>
              <b> English: &nbsp; &nbsp;&nbsp;</b>
            </td>
            <td>
              <input type="text" id="btn1" value="<?php echo $row['English'] ?>" disabled>
            </td>
          </tr>
          <tr>
            <td>
              <b> Biology: &nbsp; &nbsp;&nbsp;</b>
            </td>
            <td>
              <input type="text" id="btn1" value="<?php echo $row['Biology'] ?>" disabled>
            </td>
          </tr>
          <tr>
            <td>
              <b>Chemistry: &nbsp; &nbsp;&nbsp;</b>
            </td>
            <td>
              <input type="text" id="btn1" value="<?php echo $row['Chemistry'] ?>" disabled>
            </td>
          </tr>
          <tr>
            <td>
              <b>Physics: &nbsp; &nbsp;&nbsp;</b>
            </td>
            <td>
              <input type="text" id="btn1" value="<?php echo $row['Physics'] ?>" disabled>
            </td>
          </tr>
          <tr>
            <td>
              <b>Mathematics: &nbsp; &nbsp;&nbsp;</b>
            </td>
            <td>
              <input type="text" id="btn1" value="<?php echo $row['Mathematics'] ?>" disabled>
            </td>
          </tr>
          <tr>
            <td>
              <b>Computer-Sciences: &nbsp; &nbsp;&nbsp;</b>
            </td>
            <td>
              <input type="text" id="btn1" value="<?php echo $row['ComputerSciences'] ?>" disabled>
            </td>
          </tr>
        </table>
      </center>
      <?php
      }
    }
    ?> -->
    </div>
  </div>
</body>

</html>