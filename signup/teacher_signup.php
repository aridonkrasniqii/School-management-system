<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>LOGIN PAGE</title>

  <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  <script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
  #container {
    width: 300px;
    border: 2px solid black;
    border-radius: 30px;
    background-color: #b2bec3;
    -webkit-box-shadow: -2px 7px 21px -9px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: -2px 7px 21px -9px rgba(0, 0, 0, 0.75);
    box-shadow: -2px 7px 21px -9px rgba(0, 0, 0, 0.75);
    padding: 10px;
  }

  #heading {
    width: 300px;
    margin: 50px auto 0px auto;
    border: 2px solid black;
    border-radius: 5px;
    background-color: #b2bec3;
    -webkit-box-shadow: -2px 7px 21px -9px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: -2px 7px 21px -9px rgba(0, 0, 0, 0.75);
    box-shadow: -2px 7px 21px -9px rgba(0, 0, 0, 0.75);
  }

  body {
    background-color: #dfe6e9;
  }

  #btn {
    background-color: #dfe6e9;
    border-radius: 5px;
    width: 120px
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
      <a href="../index.html">Home</a>
      <a href="../index.html">Login</a>
      <a href="../signup.php">Sign Up</a>
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

  <center>
    <div id="template_wrapper">
      <div id="heading">
        <h3>STUDENT MANAGEMENT <br> & ACADEMIC SYSYTEM </h3>
      </div><br><br>

      <br>


      <div class="message">
        <?php

        if (isset($_GET['error'])) {
          if ($_GET['error'] == "emptyinput") {
            echo "<p id = 'p'>Fill in all fields ! </p>";
          } else if ($_GET['error'] == "invalidusername") {
            echo "<p>Invalid username! </p>";
          } else if ($_GET['error'] == "invalidemail") {
            echo "<p id = 'p'>Invalid email ! </p>";
          } else if ($_GET['error'] == "passworddoesnotmatch") {
            echo "<p id = 'p'>Password does not match ! </p>";
          } else if ($_GET['error'] == "usernametaken") {
            echo "<p id = 'p'>Username already exits ! </p>";
          } else if ($_GET['error'] == "sqlerror") {
            echo "<p id = 'p'>Something went wrong try again ! </p>";
          } else if ($_GET['error'] == "success") {
            echo "<p id = 's'> Registered succesfully </p>";
          }
        }

        ?>
      </div>
      <style>
      #p {
        color: red;
        font-family: 'Courier New', Courier, monospace;
      }

      #s {
        color: green;
        font-family: 'Courier New', Courier, monospace;
      }
      </style>


      <div id="container">
        <form action="../controllers/register-controller.php" method="post" id="form">
          <input type="text" name="index" placeholder="teacher id">
          <br><br>
          <input type="text" name="fullname" placeholder="fullname">
          <br><br>
          <input type="text" name="role" placeholder="role: student or teacher">
          <br><br>
          <input type="text" name="username" placeholder="username">
          <br><br>
          <input type="text" name="email" placeholder="email">
          <br><br>
          <input type="password" name="password" placeholder="password">
          <br><br>
          <input type="password" name="pwd-repeat" placeholder="repeat password">
          <br><br>
          <button type="submit" name="teacher-register" id="btn">Register</button>
        </form>
      </div>

    </div>
  </center>



  <style>
  #form {
    padding: 20px;
    margin: 20px;
  }
  </style>


</body>

</html>