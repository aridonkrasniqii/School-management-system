<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (isset($_POST['submit-contact'])) {
  require("../database/connection.php");
  require("../models/teacher.php");
  require("../repositories/teacher_repository.php");
  $teacher_id = $_POST['teacher-id'];
  $teacher_repository = new teacher_repository;

  $teacher = $teacher_repository->find($teacher_id);



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <form id="contact" action="../controllers/contact-controller.php" method="post">
      <h3>Quick Contact</h3>
      <h4>Send E-mail</h4>

      <fieldset>
        <input placeholder="Your name" name="name" type="text" tabindex="1" autofocus>
      </fieldset>
      <fieldset>
        <input placeholder="Your Email Address" name="email" type="email" tabindex="2">
      </fieldset>
      <fieldset>
        <input placeholder="Type your subject line" type="text" name="subject" tabindex="4">
      </fieldset>
      <fieldset>
        <textarea name="message" placeholder="Type your Message Details Here..." tabindex="5"></textarea>
      </fieldset>
      <fieldset>
        <input type="hidden" name="professor-mail" value="<?php echo $teacher->getTeacher_email(); ?>">
      </fieldset>
      <div>
      </div>
      <fieldset>
        <button type="submit" name="submit-email" id="contact-submit" data-submit="...Sending">Submit Now</button>
      </fieldset>
      <fieldset>
        <button id="about"><a href="./about-view.php">Go Back To About</a> </button>
      </fieldset>
    </form>


  </div>
</body>

</html>
<?php
}
?>


<style>
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600);

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-font-smoothing: antialiased;
  -o-font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
}

body {
  font-family: "Open Sans", Helvetica, Arial, sans-serif;
  font-weight: 300;
  font-size: 12px;
  line-height: 30px;
  color: #777;
  background: rgb(120 122 124);
}

.container {
  max-width: 400px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="url"],
#contact textarea,
#contact button[type="submit"] {
  font: 400 12px/16px "Open Sans", Helvetica, Arial, sans-serif;
}

#contact {
  background: #F9F9F9;
  padding: 25px;
  margin: 50px 0;
}

#contact h3 {
  color: blue;
  display: block;
  font-size: 30px;
  font-weight: 700;
}

#contact h4 {
  margin: 5px 0 15px;
  display: block;
  color: black;
  font-size: 13px;
}

fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact textarea {
  width: 100%;
  border: 1px solid #CCC;
  background: #FFF;
  margin: 0 0 5px;
  padding: 10px;
}

#contact input[type="text"]:hover,
#contact input[type="email"]:hover,
#contact input[type="tel"]:hover,
#contact input[type="url"]:hover,
#contact textarea:hover {
  -webkit-transition: border-color 0.3s ease-in-out;
  -moz-transition: border-color 0.3s ease-in-out;
  transition: border-color 0.3s ease-in-out;
  border: 1px solid #AAA;
}

#contact textarea {
  height: 100px;
  max-width: 100%;
  resize: none;
}

#contact button[type="submit"] {
  cursor: pointer;
  width: 100%;
  border: none;
  background: rgb(120 122 124);
  color: #FFF;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
  font-weight: bold;
}

#about {
  cursor: pointer;
  width: 100%;
  border: none;
  background: rgb(120 122 124);
  color: #FFF;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
  text-decoration: none;
}

#about a {
  text-decoration: none;
  color: white;
  font-weight: bold;
  ;
}

#contact button[type="submit"]:hover {
  background: #09C;
  -webkit-transition: background 0.3s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background-color 0.3s ease-in-out;
}

#contact button[type="submit"]:active {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}

#contact input:focus,
#contact textarea:focus {
  outline: 0;
  border: 1px solid #999;
}

::-webkit-input-placeholder {
  color: #888;
}

:-moz-placeholder {
  color: #888;
}

::-moz-placeholder {
  color: #888;
}

:-ms-input-placeholder {
  color: #888;
}

.success {
  color: green;
  font-weight: 700;
  padding: 5px;
  text-align: center;
}

.failed {
  color: red;
  font-weight: 700;
  padding: 5px;
  text-align: center;
}
</style>