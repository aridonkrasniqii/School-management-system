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
        }

        #heading {
            width: 300px;
            margin: 275px auto 0px auto;
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

      <div class = "header">
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
        padding:10px;
      }
      a{
        padding:10px;
      }
  </style>

    <center>
        <div id="template_wrapper">
            <div id="heading">
                <h3>STUDENT MANAGEMENT <br> & ACADEMIC SYSYTEM </h3>
            </div><br><br><br><br>
            <div id="container"><br><br><br>
                <br>
                <a href="../school-management-system/signup/teacher_signup.php"> <input type="submit" name="teacher_signup" value="Teacher Signup" id="btn"></a><br><br>
                <a href="../school-management-system/signup/student_signup.php"> <input type="submit" name="student_signup" value="Student Signup" id="btn"></a><br><br><br>
                <br>
            </div>

        </div>
    </center>
</body>

</html>
