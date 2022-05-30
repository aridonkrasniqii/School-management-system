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
    <h4 class="center">Search subject</h4>
    <form action="students/student_search.php" method="POST" class="white">
      <label for="title">Enter ID of student:</label>
      <input type="text" name="id">
      <input type="submit" name="student_search_form" value="search" class="btn brand z-depth-0">

      <?php
                            if(isset($_POST['search'])){
                                $id=$name=$username=$email=$index="";
                                // FIXME:
                                $id = $_POST['id'];

                                 include('students/student_search.php');

                            }
                        ?>

    </form>
  </section>
