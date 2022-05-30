<?php
session_start();
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_username'])) {
  header("Location: teacher_login.php");
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="./css/student.css">
  <!-- <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script> -->
  <style type="text/css">
  body {
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
    background-color: #b2bec3;
    width: 15%;
    top: 5%;
    position: fixed;
    border: solid 2px black;
    border-radius: 10px;
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
    position: fixed;
    left: 17%;
    top: 10%;
    color: black;
    border: solid 2px black;
    border-radius: 10px;
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
    width: 150px,

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

    }

    #right_side {
      font-size: 8px
    }


  }

  .brand {
    background: #cbb09c !important;
  }

  .brand-text {

    color: #cbb09c !important;
    font-size: 10px !important;
  }

  form {
    max-width: 460px;
    /* margin: 20px auto; */
    padding: 5px;
  }

  .card {
    width: 100% !important;
    padding: 0px !important;
  }

  .container {
    width: 90% !important;
  }
  </style>
</head>

<body>
  <div id="header">

    <center><br>
      <strong>STUDENT MANAGEMENT AND ACADEMIC SYSYTEM &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
        &nbsp;</strong>E-mail:<?php echo $_SESSION['user_email']; ?> &nbsp; &nbsp; &nbsp;
      Name:<?php echo $_SESSION['user_username']; ?>&nbsp; &nbsp;<a href="logout.php">logout</a>
    </center>
  </div>

  <div id="left_side"><br>
    <form action="" method="post">
      <center>
        <table>
          <tr>
            <td>
              <input type="submit" name="subjects" value="SUBJECTS" id="btn">
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="add_subjects" value="ADD SUBJECTS" id="btn">
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="students" value="STUDENTS" id="btn">
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="search_student" value="SEARCH STUDENT" id="btn">
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="edit_student" value="EDIT STUDENT" id="btn">
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="add_student" value="ADD STUDENT" id="btn"><br>
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="assessments_teacher" value="ASSESSMENTS" id="btn">
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="faq_teacher" value="FAQ." id="btn">
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="attachments_teacher" value="ATTACHMENTS" id="btn">
            </td>
          </tr>
        </table>
      </center>
    </form>
  </div>

  <body>
    <div class="container">
      <div id="right_side"><br><br>
        <div id="demo">

          <?php
          if (isset($_POST['subjects'])) {
            include('subjects/subject_info.php');
          }
          ?>

          <?php
          if (isset($_POST['add_subjects'])) {
            include('subjects/subject_add_form.php');
          } ?>

          <?php
          if (isset($_POST['search_student'])) {
            include('students/student_search_form.php');
          }
          if (isset($_POST['students'])) {
            include('students/student_info.php');
          }

          if (isset($_POST['search_student_id'])) {
            include('students/student_search.php');
          }

          if (isset($_POST['add_student'])) {
            include('students/student_add_form.php');
          }

          if (isset($_POST['edit_student'])) {
            include('students/student_edit_search.php');
          } ?>
          <?php
          if (isset($_POST['faq_teacher'])) {
            include("./teacher/views/faq-view.php");
          }
          ?>

          <?php
          if (isset($_POST['assessments_teacher'])) {
            require("./views/assessments-view.php");
          }
          ?>
          <?php if (isset($_POST['attachments_teacher'])) {
            require("./teacher/views/attached-teacher-view.php");
          } ?>

          <?php
          if (isset($_POST['filter-assessments'])) {
            $subject_id = $_POST['subject'];
            $semester = $_POST['semester'];
            require("./views/filtered-assessments-view.php");
          }
          ?>


          <center>
            <h3>
              <?php
              if (isset($_GET['error'])) {
                if ($_GET['error'] == 'addedstudent') {
                  echo "Student is added";
                } elseif ($_GET['error'] == 'subjectnotadded') {
                  echo "Subject not added ";
                } elseif ($_GET['error'] == 'subjectadded') {
                  echo "Subject added";
                }
              }
              ?>

            </h3>
          </center>


        </div>

        


  </body>





</html>
