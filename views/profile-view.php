<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PROFILE DASHBOARD</title>

  <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/student.css">
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
    height: 75%;
    width: 80%;
    background-color: #b2bec3;
    position: fixed;
    left: 17%;
    top: 21%;
    color: red;
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
  </style>
</head>

<body>
  <section class="profile">


    <?php

    ?>
    <div class="container">

      <?php
      include "../repositories/student-repository.php";
      include "../models/student.php";
      $userId = $_SESSION['user_id'];
      $repository = new student_repository();
      $userLoggedIn = $repository->find($userId);

      ?>
      <div class="profile__wrapper">
        <div class="profile__title">
          <h3>Profile Account</h3>
        </div>
        <div class="profile__inputs">
          <form action="../processor/change-profile-processor.php" method="post">
            <div class="profile__inputs--name">
              <label for="name">Your name</label>
              <input type="text" value="<?php echo $userLoggedIn->getStudent_name(); ?>" name="name"
                placeholder="Full Name">
            </div>
            <div class="profile__inputs--username">
              <label for="name">Your username</label>
              <input type="text" value="<?php echo $userLoggedIn->getStudent_username(); ?>" name="username"
                placeholder="Username">
            </div>
            <div class="profile__inputs--email">
              <label for="name">Your email address</label>
              <input type="text" value="<?php echo $userLoggedIn->getStudent_email(); ?>" name="email"
                placeholder="Email">
            </div>
            <div class="profile__inputs--password">
              <label for="name">Password</label>
              <input type="password" name="password" placeholder="Password">
            </div>
            <div class="profile__inputs--password">
              <label for="name">Confirm password</label>
              <input type="password" name="repeat_password" placeholder="Repeat your password">
            </div>
            <div class="profile__inputs--index">
              <label for="name">Your index</label>
              <input type="text" value="<?php echo $userLoggedIn->getStudent_index(); ?>" name="index"
                placeholder="Your index">
            </div>
            <button type="submit" name="save-updates">Save updates</button>
            <h4>
              <?php
              if (isset($_GET['error'])) {
                if ($_GET['error'] == 'success') {
                  echo "<p id = 's'>Successfully changed</p>";
                } else {
                  echo "<p id = 'f' >Failed to change profile settings </p>";
                }
              }
              ?>
              <style>
              #f {
                color: red;
              }

              #s {
                color: green;
              }
              </style>
            </h4>
          </form>
        </div>
        <div class="profile__button">
          <a href="../student_dashboard.php">Go Back</a>
        </div>
      </div>
    </div>
  </section>





</body>

</html>