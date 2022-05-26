<?php
session_start();
if (isset($_SESSION['user_id'])) {
  header("Location: student_dashboard.php");
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>STUDENT LOGIN</title>

  <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="default.css">
  <script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
  #login {
    height: 350px;
    width: 250px;
    border: 2px solid black;
    border-radius: 5px;
    margin: 220px auto 0px auto;
    background-color: #b2bec3;

  }

  #login:hover {
    -webkit-box-shadow: -2px 7px 21px -9px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: -2px 7px 21px -9px rgba(0, 0, 0, 0.75);
    box-shadow: -2px 7px 21px -9px rgba(0, 0, 0, 0.75);
  }

  #heading {
    padding-top: 50px;
  }

  body {
    background-color: #dfe6e9;

  }

  #btn {
    background-color: #dfe6e9;
    border-radius: 5px;
    width: 150px
  }

  #btn:hover {
    -webkit-box-shadow: -2px 7px 21px -9px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: -2px 7px 21px -9px rgba(0, 0, 0, 0.75);
    box-shadow: -2px 7px 21px -9px rgba(0, 0, 0, 0.75);
  }
  </style>
</head>

<body>
  <header>

    <div class="header">
      <a href="index.html">Home</a>
      <a href="index.html">Login</a>
      <a href="signup.php">Sign Up</a>
    </div>

  </header>

  <style>
  .header {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
  }

  a {
    padding: 10px;
  }
  </style>

  <center><br><br>
    <div id="login">
      <div id="heading">
        <h3>STUDENT LOGIN </h3><br><br><br>
      </div>
      <form action="controllers/login-controller.php" method="post">
        <input type="text" name="username" placeholder="E-mail or Username" id="btn" required><br><br>
        <input type="password" name="password" placeholder="Password" id="btn" required><br><br>
        <?php
        if (isset($_GET['error'])) {
          if ($_GET['error'] == "wrongpwd") {
            echo "<p id = 'f'>Wrong password</p>";
          }
          if ($_GET['error'] == 'invalidusername') {
            echo "<p id = 'f' >Invalid username </p>";
          }
        }
        ?>
        <input type="submit" name="login-student" value="login">
      </form><br>

      <style>
      #f {
        color: red;
      }
      </style>
    </div>
  </center>
</body>

</html>