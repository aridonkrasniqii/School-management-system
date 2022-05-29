<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

?>


<body>
  <?php

  if (isset($_GET['filename'])) {
    $file = $_GET['filename'];
  ?>

  <center>
    <h3>Homework file </h3>
    <embed src="<?php echo $file; ?>" width="800px" height="800px" />
  </center>

  <?php } else {
    header("Location: ../student_dashboard.php");
    exit();
  }
  ?>

  <div>
    <?php ?>
    <button id="button"> <a href=" ../student_dashboard.php" id="btn">Go back to home page</a></button>
    <?php ?>
  </div>
</body>
<style>
body {
  background-color: grey;
}

#btn {
  color: black;
  font-size: 25px;
  text-decoration: none;
  font-weight: bold;
}

#button {
  margin-bottom: 100px;
}
</style>