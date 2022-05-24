<?php require("../database/db.php");
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"aca");

    $id=$title=$credits=$type=$lectured_by="";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $title = $_GET['title'];
        $credits = $_GET['credits'];
        $type = $_GET['type'];
        $lectured_by = $_GET['lectured_by'];
    }
?>



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
    <h4 class="center">Edit subject</h4>
    <form action="subject_edit.php" method="POST" class="white">
      <label for="title">ID of subject:</label>
      <input type="text" name="id" value=<?php echo $id; ?>>
      <label for="title">Title of subject:</label>
      <input type="text" name="title" value=<?php echo $title; ?>>
      <label for="credits">Credits of subject: </label>
      <input type="text" name="credits" value=<?php echo $credits; ?>>
      <label for="type">Type of subject : </label>
      <input type="text" name="type" placeholder="Compulsory or Recommended" value=<?php echo $type; ?>>
      <label for="lectured_by">Lectured by (teacher ID): </label>
      <input type="text" name="lectured_by" placeholder="Teacher ID" value=<?php echo $lectured_by; ?>>
      <div class="center">
        <input type="submit" name="edit" value="submit" class="btn brand z-depth-0">

      </div>


    </form>

  </section>
</body>

</html>