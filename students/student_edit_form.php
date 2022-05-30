<?php

require("../database/connection.php");
$connection = db::getConnection();

if (isset($_POST['student_edit_search'])) {

  $id = mysqli_real_escape_string($connection, $_POST['id']);
  $query = "select * from student where student_id = $id;";
  $students = [];
  $stmt = mysqli_stmt_init($connection);

  if (!mysqli_stmt_prepare($stmt, $query)) {
    throw new Exception();
  } else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
      $students[] = $row;
    }
  }

  foreach ($students as $s) {

    $id = $s['student_id'];
    $name = $s['student_name'];
    $username = $s['student_username'];
    $email = $s['student_email'];
    $index = $s['student_index'];
  }
} ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<style>
.brand {
  background: #cbb09c !important;
}

.brand-text {

  color: #cbb09c !important;
  font-size: 10px !important;
}

form {
  max-width: 460px;
  margin: 20px auto;
  padding: 20px;
}

.card {
  width: 100% !important;
  padding: 0px !important;
}
</style>

<body>
  <section class="container" grey-text>
    <h4 class="center">Edit student</h4>
    <form action="student_edit.php" method="POST" class="white">
      <label for="id">ID of student:</label>
      <input type="text" name="id" value=<?php echo $id; ?>>
      <label for="name">Name of student: </label>
      <input type="text" name="name" value=<?php echo $name; ?>>
      <label for="username">Username of subject : </label>
      <input type="text" name="username" value=<?php echo $username; ?>>
      <label for="email">Email of student: </label>
      <input type="text" name="email" value=<?php echo $email; ?>>
      <label for="index">Index of student: </label>
      <input type="text" name="index" value=<?php echo $index; ?>>
      <div class="center">
        <input type="submit" name="edit" value="submit" class="btn brand z-depth-0">
        <input type="submit" name="delete" value="delete" class="btn brand z-depth-0">
      </div>


    </form>


  </section>
</body>

</html>